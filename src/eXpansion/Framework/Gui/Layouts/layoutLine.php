<?php

namespace eXpansion\Framework\Gui\Layouts;

use FML\Controls\Control;
use FML\Controls\Frame;
use FML\Elements\Format;
use FML\Script\Features\ScriptFeature;
use FML\Types\Container;
use FML\Types\Renderable;
use FML\Types\ScriptFeatureable;

class layoutLine implements Renderable, ScriptFeatureable, Container
{
    protected $frameClasses = [];

    protected $frameId = null;

    /** @var float */
    protected $width = 0.;

    /** @var float */
    protected $height = 0.;

    /** @var Control[] */
    protected $elements = [];

    /** @var float */
    private $margin = 2.;
    /**
     * @var float
     */
    protected $startX = 0.;
    /**
     * @var float
     */
    protected $startY = 0.;

    /** @var string */
    protected $hAlign = "left";

    /** @var string */
    protected $vAlign = "top";

    /**
     * layoutLine constructor.
     * @param float $startX
     * @param float $startY
     * @param object[] $elements
     * @param float $margin
     * @throws \Exception
     */
    public function __construct($startX, $startY, $elements = [], $margin = 0.)
    {
        if (!is_array($elements)) {
            throw new \Exception('not an array');
        }
        $this->margin = $margin;
        $this->elements = $elements;
        $this->startX = $startX;
        $this->startY = $startY;
        $sizeY = 0;
        foreach ($this->elements as $idx => $element) {
            $this->width += $element->getWidth() + $this->margin;
            if ($element->getY() + $element->getHeight() > $sizeY) {
                $this->setHeight($element->getHeight());
            }
        }

    }

    /**
     * Render the XML element
     *
     * @param \DOMDocument $domDocument DOMDocument for which the XML element should be rendered
     * @return \DOMElement
     */
    public function render(\DOMDocument $domDocument)
    {
        $frame = new Frame();
        $frame->setId($this->frameId);
        $frame->setAlign($this->hAlign, $this->vAlign);
        $frame->setPosition($this->startX, $this->startY);
        $frame->addClasses($this->frameClasses);

        $start = 0;
        $sizeY = 0;

        foreach ($this->elements as $idx => $element) {

            $element->setX($start + $this->getRelativeStartPosition($element));
            $start += $element->getWidth() + $this->margin;

            if ($element->getY() + $element->getHeight() > $sizeY) {
                $this->setHeight($element->getHeight());
            }
            $frame->addChild($element);
        }

        return $frame->render($domDocument);
    }

    /**
     * @param Control $element
     * @return float|int
     */
    private function getRelativeStartPosition($element)
    {
        if ($element->getHorizontalAlign() == "center") {
            return ($element->getWidth() / 2);
        }

        return 0;
    }

    /**
     * Get the Script Features
     *
     * @return ScriptFeature[]
     */
    public function getScriptFeatures()
    {
        $features = [];
        foreach ($this->elements as $element) {
            if ($element instanceof ScriptFeatureable) {
                $features[] = $element->getScriptFeatures();
            }
        }

        return ScriptFeature::collect($features);
    }

    /**
     * @param mixed $startX
     * @return layoutLine
     */
    public function setX($startX)
    {
        $this->startX = $startX;

        return $this;
    }

    /**
     * @param mixed $startY
     * @return layoutLine
     */
    public function setY($startY)
    {
        $this->startY = $startY;

        return $this;
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->startX;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->startY;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @param object $element
     */
    public function addChild(Renderable $element)
    {
        $this->elements[] = $element;
        $this->width += $element->getWidth() + $this->margin;
        $this->height += $element->getHeight();
    }

    public function getChildren()
    {
        return $this->elements;
    }


    public function addClass($class)
    {
        $this->frameClasses [] = $class;
    }

    /**
     * Add a new child
     *
     * @api
     * @param Renderable $child Child Control to add
     * @return static
     * @deprecated Use addChild()
     * @see        Container::addChild()
     */
    public function add(Renderable $child)
    {
        // TODO: Implement add() method.
    }

    /**
     * Add new children
     *
     * @api
     * @param Renderable[] $children Child Controls to add
     * @return static
     */
    public function addChildren(array $children)
    {
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * Remove all children
     *
     * @api
     * @return static
     */
    public function removeAllChildren()
    {
        $this->width = 0;
        $this->height = 0;
        $this->elements = [];

        return $this;
    }

    /**
     * Remove all children
     *
     * @api
     * @return static
     * @deprecated Use removeAllChildren()
     * @see        Container::removeAllChildren()
     */
    public function removeChildren()
    {
        // TODO: Implement removeChildren() method.
    }

    /**
     * Get the Format
     *
     * @api
     * @param bool $createIfEmpty If the format should be created if it doesn't exist yet
     * @return Format
     * @deprecated Use Style
     * @see        Style
     */
    public function getFormat($createIfEmpty = true)
    {

    }

    /**
     * Set the Format
     *
     * @api
     * @param Format $format New Format
     * @return void
     * @deprecated Use Style
     * @see        Style
     */
    public function setFormat(Format $format = null)
    {

    }

    public function setAlign($hAling = "left", $vAlign = "top")
    {
        $this->halign = $hAling;
        $this->valign = $vAlign;

        return $this;
    }


    public function setPosition($x, $y)
    {
        $this->setX($x);
        $this->setY($y);

        return $this;
    }

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->frameId;
    }

    /**
     * @param null|string $frameId
     */
    public function setId($frameId)
    {
        $this->frameId = $frameId;

        return $this;
    }

    /**
     * @return string
     */
    public function getHorizontalAlign(): string
    {
        return $this->hAlign;
    }

    /**
     * @param string $hAlign
     */
    public function setHorizontalAlign(string $hAlign)
    {
        $this->hAlign = $hAlign;

        return $this;
    }

}
