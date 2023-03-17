<?php

namespace App\Controller;

use App\Repository\DestinationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DestinationController extends AbstractController
{
    #[Route('api/destination/', name: 'getDestinations', methods:['GET'])]
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
