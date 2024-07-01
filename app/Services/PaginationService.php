<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationService
{
    const DEFAULT_PER_PAGE = 20;

    /**
     * Retourne les informations concernant la pagination
     */
    public static function paginationInfo(Request $request)
    {
        if (static::paginationExist($request)) {
            return [
                'page' => $request->page,
                'perPage' => $request->per_page ?? 20,
            ];
        }
        return null;
    }

    /**
     * Verifie si Front demande une pagination lorsqu'il y page dans le paramètre get
     */
    public static function paginationExist(Request $request)
    {
        return $request->page ?? false != false;
    }

    public static function get(Request $request, Model|Builder $query, string $name = '', $columns=["*"]) : Collection | LengthAwarePaginator | array
    {
        if ($paginationInfo = static::paginationInfo($request)) {
            $paginated = $query->paginate($paginationInfo['perPage'], $columns, $name, $paginationInfo['page']);
            return $paginated;
        } else {
            return $query->get();
        }
    }
}
