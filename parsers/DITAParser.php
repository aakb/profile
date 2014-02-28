<?php

include_once 'iParser.inc';
include_once 'leaf.php';
include_once 'tree.php';
include_once 'index.php';

class DITAParser implements iParser {
  private function danishChars($text) {
    $text = preg_replace('/å/', '%86', $text);
    $text = preg_replace('/Å/', '%87', $text);
    $text = preg_replace('/æ/', '%91', $text);
    $text = preg_replace('/Æ/', '%92', $text);
    $text = preg_replace('/ø/', '%9B', $text);
    $text = preg_replace('/Ø/', '%9C', $text);
    return $text;
  }

  private function traverseNode($node, $pathToDirectory) {
    $nodeType = $node->getName();

    if ($nodeType == 'topicref') {
      $href = $this->danishChars($node['href']);

      // Get the reference
      $body = simplexml_load_file($pathToDirectory . '/' . $href);
/*      $domnode = dom_import_simplexml($body);
      $dom = new DOMDocument();
      $domnode = $dom->importNode($domnode, true);
      $dom->appendChild($domnode);

      // Replace all <ph> with text
      foreach ($body->xpath('//ph') as $ph) {
        $conref = explode('#', $ph['conref']);
        $file = $conref[0];

        $id = explode('/', $conref[1]);
        $id = $id[count($id) - 1];

        $varXML = simplexml_load_file($pathToDirectory . '/' . dirname($href) . '/' . $file);

        $phText = $varXML->xpath('//ph[@id="' . $id . '"]');

        $ph = dom_import_simplexml($ph);
        $phText = dom_import_simplexml(simplexml_load_string('<span>' . $phText[0] . '</span>'));
        $dom->replaceChild($ph, $phText);
      }
*/
      

      $leaf = new Leaf($node['navtitle'], $body);
      return $leaf;
    } else if ($nodeType == 'topichead') {
      $children = array();
      foreach ($node->children() as $child) {
        $children[] = $this->traverseNode($child, $pathToDirectory);
      }

      $tree = new Tree($node['navtitle'], $children);
      return $tree;
    }
    return null;
  }

  /**
   * Processes a Dita zip file
   *
   * @param $pathToDirectory
   * @throws Exception
   *
   * @returns Index
   *  The index root node
   */
  public function process($pathToDirectory) {
    $xml = simplexml_load_file($pathToDirectory . '/' . 'Ditamap.ditamap');

    $children = array();
    foreach ($xml->children() as $child) {
      $children[] = $this->traverseNode($child, $pathToDirectory);
    }

    $index = new Index($children);

    return $index;
  }

  public function identifyFormat($pathToDirectory) {
    $entries = scandir($pathToDirectory);
    foreach ($entries as $entry) {
      if ($entry == 'Ditamap.ditamap') {
        return true;
      }
    }
    return false;
  }
}