<?php
echo Form::label($key, str_replace(['_', '-'], ' ', $key)).": <br>";
if (preg_match('/(\|)/', $item)) {
		$chuncks = explode('|', $item);

		echo '<div style="margin-left: 15px;">';
		foreach ($chuncks as $k => $chunck) {
			preg_match('/^({\w}|\[[\w,]+\])([\w\s:]+)/', trim($chunck), $m);

			if (empty($m)) {
				echo Form::label($chunck, (!$k ? trans('admin.language.singular') : trans('admin.language.plural')).":");
				echo Form::textarea((empty($parents) ? $key : implode('__', $parents)."__{$key}")."[after][]", $chunck, ['class' => 'form-control', 'rows'=>2]).'<br>';
			} else {
				echo Form::label($chunck, (!$k ? trans('admin.language.singular') : trans('admin.language.plural'))." ($m[1]):");
				echo Form::hidden((empty($parents) ? $key : implode('__', $parents)."__{$key}")."[before][]", $m[1]);
				echo Form::textarea((empty($parents) ? $key : implode('__', $parents)."__{$key}")."[after][]", $m[2], ['class' => 'form-control', 'rows'=>2]).'<br>';
			}
		}
		echo '</div>';
} else {
	echo Form::textarea((empty($parents) ? $key : implode('__', $parents)."__{$key}"), $item, ['class' => 'form-control', 'rows'=>2])."<br>";
}

?>
