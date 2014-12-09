<?php

namespace MG\RICMS\RICMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capitulo
 *
 * @ORM\Table(name="capitulo")
 * @ORM\Entity(repositoryClass="MG\RICMS\RICMSBundle\Entity\CapituloRepository")
 */
class Capitulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_livro", type="integer")
     */
    private $idLivro;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idLivro
     *
     * @param integer $idLivro
     * @return Capitulo
     */
    public function setIdLivro($idLivro)
    {
        $this->idLivro = $idLivro;

        return $this;
    }

    /**
     * Get idLivro
     *
     * @return integer 
     */
    public function getIdLivro()
    {
        return $this->idLivro;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Capitulo
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Capitulo
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
