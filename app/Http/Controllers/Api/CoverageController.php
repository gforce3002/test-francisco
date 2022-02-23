<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\CoverageService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoverageController extends Controller
{
    /**
     * @var CoverageService
     */
    private $coverageService;

    public function __construct(CoverageService $coverageService)
    {
        $this->coverageService = $coverageService;
    }

    public function create(Request $request) {
        return response()->json($this->coverageService->create($request->get('name')))->setStatusCode(201);
    }

    public function getList(Request $request) {
        return response()->json($this->coverageService->getList($request->get('page')));
    }

    public function get(Request $request, $id) {
        $data = $this->coverageService->findById($id);

        if (empty($data)) {
            throw new NotFoundHttpException('Cobertura no válida');
        }

        return response()->json($data);
    }

    public function update(Request $request, $id) {
        return response()->json($this->coverageService->update($id, $request->get('name')));
    }

    public function remove(Request $request, $id) {
        $this->coverageService->remove($id);
        return response()->json([])->setStatusCode(204);
    }
}
