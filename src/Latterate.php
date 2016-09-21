<?php namespace Postfriday\Latterate;

use Illuminate\Support\Str;

class Latterate
{
  private function setOptions($array)
  {
    $default = [
      'delimeter'                 => '-',
      'text_transform'            => 'lowercase',
      'strip_non_slug_symbols'    => true,
      'transliteration_mode'      => 'default',
      'remove_repeated_delimeter' => true,
    ];
    if (is_array($array))
    {
      $keys = array_keys($array);
      foreach($default as $key => $val)
      {
        if (!in_array($key, $keys))
        {
          $array[$key] = $val;
        }
      }
    }
    return $array;
  }

  private function textTransform($string, $type)
  {
    switch($type)
    {
      case 'lowercase':
        return Str::lower($string);
        break;
      case 'uppercase':
        return Str::upper($string);
        break;
    }
    return $string;
  }

  private function stripNonSlugSymbols($string, $delimeter)
  {
    return preg_replace('/[^a-z0-9\-]/i', $delimeter, $string);
  }

  private function transliterate($string, $mode)
  {
    switch($mode)
    {
      default:
        return Str::ascii($string);
        break;
    }
  }

  private function removeRepeatedDelimeter($string, $delimeter)
  {
    $search = $delimeter . $delimeter;
    while (stristr($string, $search) !== false)
    {
      $string = str_replace($search, $delimeter, $string);
    }
    return $string;
  }

  public function transform($string, $options = [])
  {
    $options = $this->setOptions($options);
    $string = $this->transliterate($string, $options['transliteration_mode']);
    $string = $this->textTransform($string, $options['text_transform']);
    if ($options['strip_non_slug_symbols']) {
      $string = $this->stripNonSlugSymbols($string, $options['delimeter']);
    }
    if ($options['remove_repeated_delimeter']) {
      $string = $this->removeRepeatedDelimeter($string, $options['delimeter']);
    }
    return $string;
  }
}
