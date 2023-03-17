<?php

namespace App\Controller;

use App\Entity\Destination;
use OpenApi\Attributes\Tag;
use OpenApi\Attributes as OA;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\JsonContent;
use App\Repository\DestinationRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DestinationController extends AbstractController
{
    #[Route('api/destination', name: 'getDestinations', methods:['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns the rewards of an user',
        content: new JsonContent(
            type: 'array',
            items: new Items(ref: new Model(type: Destination::class, groups: ['full']))
        )
    )]
    #[Parameter(
        name: 'longDestination',
        in: 'query',
        description: 'The field used to filter by long destination or not',
        schema: new Schema(type: 'integer')
    )]
    #[Parameter(
        name: 'start',
        in: 'query',
        description: 'The start destination',
        schema: new Schema(type: 'sting')
    )]
    #[Parameter(
        name: 'end',
        in: 'query',
        description: 'The end destination',
        schema: new Schema(type: 'sting')
    )]
    #[Tag(name: 'Destinations')]
    public function getdestinations(DestinationRepository $destinationRepository, SerializerInterface $serializerInterface, Request $request): JsonResponse
    {
        $longDestination = $request->get('longDestination');
        $start = $request->get('start');
        $end = $request->get('end');
        
        if (isset($longDestination)) {
            $destination = $destinationRepository->getLongDistanceDestinations($longDestination);
        } else if (isset($start) && isset($end)) {
            $destination = $destinationRepository->getDestination($start, $end);
        } else {
            $destination = $destinationRepository->findAll();
        }

        $jsonDestinationRepository = $serializerInterface->serialize($destination, 'json');

        return new JsonResponse($jsonDestinationRepository, Response::HTTP_OK, [], true);
    }
}
