<?php

namespace Application\Core\Http\Middleware;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Closure;

/**
 * @see https://gregkedzierski.com/essays/converting-laravel-api-requests-and-responses-to-camelcase/
 */
class ConvertResponseFieldsToCamelCase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try
        {
            $response = $next($request);
            $content = $response->getContent();

            $json = json_decode($content, true);
            $replaced = $this->arrayKeysToCamelCase($json);
            $response->setContent($replaced);
        }
        catch (\Exception $e)
        {
            // you can log an error here if you want
        }

        return $response;
    }

    private function arrayKeysToCamelCase($array)
    {
        $result = [];
        foreach ($array as $key => $value)
        {
            if (is_array($value))
            {
                $value = $this->arrayKeysToCamelCase($value);
            }

            $result[Str::camel($key)] = $value;
        }

        return $result;
    }
}
