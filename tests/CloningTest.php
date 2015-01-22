<?php

class CloningTest extends PHPUnit_Framework_TestCase
{
    public function testClone()
    {
        $list1 = new Gettext\Translations();
        $item = new Gettext\Translation('', 'Test');
        $list1->append($item);

        $clonedItem = clone $item;
        $this->assertNotSame($item, $clonedItem);

        $item1 = $list1->find($item);
        $this->assertSame($item, $item1);

        $list2 = clone $list1;
        $item2 = $list2->find($item1);
        $this->assertInstanceOf('Gettext\\Translation', $item2);
        $this->assertNotSame($item, $item2);

        $item1->setOriginal('Test 1');
        $item2->setOriginal('Test 2');

        $this->assertSame('Test 1', $item1->getOriginal());
        $this->assertSame('Test 2', $item2->getOriginal());
    }
}
