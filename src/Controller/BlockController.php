<?php
namespace App\Controller;

use App\Entity\Block;
use App\Repository\BlockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlockController extends AbstractController
{
    public function view(Block $id, BlockRepository $BlockRepository)
    {
        $block = $BlockRepository->find($id);

        return $this->render('block.html.twig',[
            'block' => $block
        ]);

    }
}