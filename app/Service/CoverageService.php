<?php
namespace App\Service;

use App\Coverage;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoverageService
{

    const PAGE_SIZE = 20;

    public function create($name) {
        if (empty($name)) {
            throw new BadRequestHttpException('El nombre es requerido');
        }

        $coverage = new Coverage();
        $coverage->name = $name;
        $coverage->save();

        return $coverage;
    }

    public function getList($page = 1) {
        $data = Coverage::query();
        $count = count((clone $data)->get());
        $pagesCount = (int) ceil($count / self::PAGE_SIZE);

        $pages = [];
        for ($i = 1; $i <= $pagesCount; $i++) {
            $pages[] = $i;
        }

        $offset = (self::PAGE_SIZE * $page) - self::PAGE_SIZE;
        $data = $data->offset($offset)->limit(self::PAGE_SIZE);
        $results = $data->get();

        return [
            'pages' => $pages,
            'results' => $results
        ];
    }

    public function findById($id) {
        return Coverage::query()->where('id', $id)->first();
    }

    public function update($id, $name) {
        $coverage = $this->findById($id);

        if (empty($coverage)) {
            throw new NotFoundHttpException('Cobertura inválida');
        }

        $coverage->name = $name;
        $coverage->save();
    }

    public function remove($id) {
        $coverage = $this->findById($id);

        if (empty($coverage)) {
            throw new NotFoundHttpException('Cobertura inválida');
        }

        $coverage->delete();
    }
}
