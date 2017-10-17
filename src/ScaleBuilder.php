<?php


namespace Mu;


use Mu\Exceptions\ModeClassNotFoundException;
use Mu\Exceptions\ModeFactoryClassNotFoundException;
use Mu\Exceptions\ModeFactoryClassNotSetException;
use Mu\Exceptions\NoteNotFoundException;
use Mu\Intervals\IntervalFactory;
use Mu\Modes\AbstractModeFactory;
use Mu\Notes\Note;
use Mu\Scales\Scale;
use Mu\Scales\ScaleFactory;

class ScaleBuilder
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Note
     */
    private $root;

    private $modeClass;
    private $modeFactoryClass;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $class
     * @return ScaleBuilder
     * @throws ModeClassNotFoundException
     * @throws ModeFactoryClassNotFoundException
     */
    public function setMode(string $class): ScaleBuilder
    {
        if (!class_exists($class)) {
            throw new ModeClassNotFoundException($class);
        }

        $factoryClass = $class . 'Factory';

        if (!class_exists($factoryClass)) {
            throw new ModeFactoryClassNotFoundException($class);
        }

        $this->modeClass = $class;
        $this->modeFactoryClass = $factoryClass;

        return $this;
    }

    /**
     * @param Note $root
     * @return ScaleBuilder
     */
    public function setRoot(Note $root): ScaleBuilder
    {
        $this->root = $root;
        return $this;
    }

    /**
     * @param string $name
     * @return ScaleBuilder
     * @throws NoteNotFoundException
     */
    public function setRootByName(string $name): ScaleBuilder
    {
        $notes = $this->config->getNotes();

        if (($baseSemitone = array_search($name, $notes, true)) !== false) {
            $note = new Note($name, $baseSemitone);
            $this->setRoot($note);
        } else {
            throw new NoteNotFoundException($name);
        }

        return $this;
    }

    /**
     * @return Scale
     * @throws Exceptions\RootNoteNotSetException
     * @throws ModeFactoryClassNotSetException
     */
    public function build(): Scale
    {
        if (!$this->modeFactoryClass) {
            throw new ModeFactoryClassNotSetException('No mode was set');
        }

        if (!$this->root instanceof Note) {
            throw new Exceptions\RootNoteNotSetException('No root note was set');
        }

        /** @var AbstractModeFactory $modeFactory */
        $modeFactory = new $this->modeFactoryClass(new IntervalFactory(), $this->root);
        $mode = $modeFactory->create();

        $scaleFactory = new ScaleFactory($this->config);
        return $scaleFactory->create($this->root, $mode);
    }
}
