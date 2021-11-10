<?php


namespace App\Directives;


class SortableLink
{
    protected static $request;

    public static function render($field)
    {
        self::$request = request();

        if (self::$request->get('sort') == $field && in_array(self::$request->get('direction'), ['asc', 'desc'])) {
            $direction = self::$request->get('direction') === 'asc' ? 'desc' : 'asc';
            $queryString = self::buildQueryString($field,$direction);
            $class = $direction;
        } else {
            $direction = 'asc';
            $queryString = self::buildQueryString($field, $direction);
            $class= '';
        }
        $link = url(self::$request->path()).'?'.$queryString;
        $name = __("admin.sortables.$field");

        return "<a class=\"$class\" href=\"$link\">$name</a>";
    }

    private static function buildQueryString($field, $direction  = 'asc')
    {
        // удаляем пустые параметры, сортировуку  и страницы
        $queryParameters = array_filter(self::$request->except('sort', 'direction', 'page'));
        return http_build_query(array_merge($queryParameters, [
            'sort'      => $field,
            'direction' => $direction,
        ]));
    }
}
