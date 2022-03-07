<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use InvalidArgumentException;

class KeyCaseConverter
{
    public const CASE_SNAKE = 'snake';
    public const CASE_CAMEL = 'camel';

    /**
     * Convert an array to a given case.
     *
     * @param string $case
     * @param $data
     * @return array
     */
    public function convert(string $case, $data)
    {
        if (!in_array($case, [self::CASE_CAMEL, self::CASE_SNAKE])) {
            throw new InvalidArgumentException('Case must be either snake or camel');
        }

        if (!is_array($data)) {
            return $data;
        }

        $array = [];

        foreach ($data as $key => $value) {
            $array[Str::{$case}($key)] = is_array($value)
                ? $this->convert($case, $value)
                : $value;
        }

        return $array;

    }
}


class ConvertToSnail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->replace(
            resolve(KeyCaseConverter::class)->convert(
                KeyCaseConverter::CASE_SNAKE,
                $request->all()
            )
        );

        return $next($request);
    }
}
