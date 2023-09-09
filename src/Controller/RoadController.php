<?php

namespace App\Controller;

use App\Entity\Road;
use OpenApi\Attributes\Tag;
use OpenApi\Attributes as OA;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Parameter;
use App\Repository\RoadRepository;
use OpenApi\Attributes\JsonContent;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoadController extends AbstractController
{
    #[Route('api/road', name: 'getRoads', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns the rewards of an user',
        content: new JsonContent(
            type: 'array',
            items: new Items(ref: new Model(type: Road::class, groups: ['full']))
        )
    )]
    #[Parameter(
        name: 'start',
        in: 'query',
        description: 'The start Road',
        schema: new Schema(type: 'string')
    )]
    #[Parameter(
        name: 'end',
        in: 'query',
        description: 'The end Road',
        schema: new Schema(type: 'string')
    )]
    #[Tag(name: 'Roads')]
    public function getRoads(RoadRepository $roadRepository, SerializerInterface $serializerInterface, Request $request, TagAwareCacheInterface $cache): JsonResponse
    {
        $idCacheRoad = "getRoads";
        $idCacheScoreRoad = "getScoreRoad";
        $idCacheLocomotive = "getLocomotive";
        $idCacheWagonNumber = "getWagonNumber";
        $idCacheRoadStartEnd = "getRoadsStartEnd";

        $scoreRoad = $request->get('scoreRoad');
        $locomotive = $request->get('scoreRoad');
        $wagonNumber = $request->get('scoreRoad');
        $start = $request->get('start');
        $end = $request->get('end');

        if (isset($scoreRoad)) {
            $road = $cache->get($idCacheScoreRoad, function (ItemInterface $item) use ($roadRepository, $scoreRoad) {
                echo 'Score road are not in cache';
                $item->tag('RoadsCache');
                $item->expiresAfter(60);
                return $roadRepository->getLongDistanceRoads($scoreRoad);
            });
        } else if (isset($start) && isset($end)) {
            $road = $cache->get($idCacheRoadStartEnd, function (ItemInterface $item) use ($roadRepository, $start, $end) {
                echo 'Road stard end are not in cache';
                $item->tag('RoadsCache');
                $item->expiresAfter(60);
                return $roadRepository->getRoad($start, $end);
            });
        } else if (isset($locomotive)) {
            $road = $cache->get($idCacheLocomotive, function (ItemInterface $item) use ($roadRepository, $start, $end) {
                echo 'Road stard end are not in cache';
                $item->tag('RoadsCache');
                $item->expiresAfter(60);
                return $roadRepository->getRoad($start, $end);
            });
        } else if (isset($wagonNumber)) {
            $road = $cache->get($idCacheWagonNumber, function (ItemInterface $item) use ($roadRepository, $start, $end) {
                echo 'Road stard end are not in cache';
                $item->tag('RoadsCache');
                $item->expiresAfter(60);
                return $roadRepository->getRoad($start, $end);
            });
        } else {
            $road = $cache->get($idCacheRoad, function (ItemInterface $item) use ($roadRepository) {
                echo 'Road are not in cache';
                $item->tag('RoadsCache');
                $item->expiresAfter(60);
                return $roadRepository->findAll();
            });
        }

        $jsonRoadRepository = $serializerInterface->serialize($road, 'json', ['groups' => 'getRoads']);

        return new JsonResponse($jsonRoadRepository, Response::HTTP_OK, [], true);
    }
}
