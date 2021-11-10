<?php

class Node
{
    private $left;
    private $right;

    public function __construct(Node $left = null, Node $right = null)
    {
        $this->left  = $left;
        $this->right = $right;
    }

    public function __get($attr)
    {
        return $this->{$attr};
    }
}

function maxHeight(Node $node = null)
{
    if (!$node) {
        return 0;
    }

    $l = maxHeight($node->left);
    $r = maxHeight($node->right);

    return ($l > $r) ? $l +1 : $r + 1;
}

$node = new Node(
    new Node(
        new Node(
            new Node(
                new Node(),
                new Node()
            ),
            new Node()
        ),
        new Node()
    ),
    new Node(
        new Node(
            new Node()
        ),
        new Node()
    )
);

echo maxHeight($node);