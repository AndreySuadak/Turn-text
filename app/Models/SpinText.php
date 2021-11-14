<?php
    namespace App\Models;

    class SpinText {
        public function StringChange($text) {
            $new_strong = "";

            $break_text = explode(" ", $text);  // создаем массив разбив строку

            // запускаем цикл для переборки каждого элемента массива
            foreach ($break_text as $value) {
                // создадим проверку на наличие заглавной буквы
                if(mb_strtolower($value) == $value) {
                    // НЕТ заглавной буквы
                    $new_text = $this->SpinWord($value);
                } else {
                    // НАШЛИ ЗАГЛАВНУЮ
                    $new_value = $this->SpinWord($value);
                    $new_text = mb_convert_case($new_value, MB_CASE_TITLE, 'UTF-8'); //Первую букву в верхний регистр ТОЛЬКО атк получилось с кирилицей
                }
                //Собираем слов в строку
                $new_strong = $new_strong . $new_text . " ";
            }
            $new_strong = trim($new_strong);//Убераем пробелы
            $this->new_strong = $new_strong;
            // echo $this->$new_strong . "2";
            // return $new_strong;
        }

        private function SpinWord($text) {
            $znak_N = 0; //переменная для обнаружения знака (: ; . ! ? ,)
            $znak_L = ""; //Значение знака (: ; . ! ? ,)
            $text = mb_strtolower($text);  //все в нижний регистр
            $value_arr = mb_str_split($text); //Разбили слово на символы СОздали массив
            $value_revers = array_reverse($value_arr); //РАзвернули массив

            // Запускаем массив СЛОВО - работаем с одним словом
            foreach ($value_revers as $leter) {
                // ЕСТЬ ЛИ ЗНАК(, :  ;  -  . !  ?)
                if ($leter == "," || $leter == ";" || $leter == ":" || $leter == "-" || $leter == "." || $leter == "!" || $leter == "?") {
                    //Нашли знак
                    $znak_N = 1; // Ставим флажок что знак есть
                    $znak_L = $leter;
                }
            }
            // ЕСЛИ знак есть
            if($znak_N == 1) {
                array_push($value_revers, $znak_L); //ставим знак в конец
                unset($value_revers[0]);           //удаляем 0 элемент
            }

            $new_text = implode($value_revers); //Из массива в СТРОКУ
            return $new_text;
        }

        public function gettext() {
            // echo $this->new_strong;
            return $this->new_strong;
        }
    }
// Наш текст
$My_text = "Нет никого, кто любил бы боль Саму по себе.";

$result = new SpinText();
$result->StringChange($My_text);
$newText = $result->gettext();

echo $newText;
