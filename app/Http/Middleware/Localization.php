<?php

namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Session;

    class Localization
    {
        protected $localeMap = [
            'de' => 'de_CH.UTF-8',
            'fr' => 'fr_CH.UTF-8',
            'it' => 'it_CH.UTF-8',
            'en' => 'en_UK.UTF-8',
        ];

        public function handle(Request $request, Closure $next)
        {
            $supportedLocales = config('app.supported_locales');
            if (! Session::has('locale') || ! in_array(Session::get('locale'), $supportedLocales)) {
                Session::put('locale', $request->getPreferredLanguage($supportedLocales));
            }

            $this->setAppLocale(Session::get('locale'));

            /** @var Response $response */
            $response = $next($request);

            return $response->header('Content-Language', App::getLocale());
        }

        protected function setAppLocale($locale)
        {
            App::setLocale($locale);
            $phpLocale = Arr::has($this->localeMap, $locale) ? $this->localeMap[$locale] : $locale;
            setlocale(LC_ALL, $phpLocale);
        }
    }
