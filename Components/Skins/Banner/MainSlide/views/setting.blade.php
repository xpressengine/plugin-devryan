button html
{{ uio('formText', ['name'=>'button_html', 'type'=>'text', 'value'=>(isset($item['button_html']) ? $item['button_html'] : '자세히 보기')]) }}

Navigator Message
{{ uio('formText', ['name'=>'nav_message', 'type'=>'text', 'value'=>(isset($item['nav_message']) ? $item['nav_message'] : '')]) }}

Navigator Line Length (px)
{{ uio('formText', ['name'=>'nav_line_length', 'type'=>'text', 'value'=>(isset($item['nav_line_length']) ? $item['nav_line_length'] : '100')]) }}

