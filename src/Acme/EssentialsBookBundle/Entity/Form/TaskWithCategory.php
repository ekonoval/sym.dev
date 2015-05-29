<?php
namespace Acme\EssentialsBookBundle\Entity\Form;

use Symfony\Component\Validator\Constraints as Assert;


class TaskWithCategory
{
    /**
     * @Assert\NotBlank()
     */
    protected $task;

    protected $dueDate;

    /**
     * //@Assert\NotBlank()
     */
    protected $comment;

    /**
     * @Assert\Type(type="Acme\EssentialsBookBundle\Entity\Form\Category")
     * @Assert\Valid()
     *
     * @var Category
     */
    protected $category;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }
}
