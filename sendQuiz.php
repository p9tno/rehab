<?php

// Включаем WordPress функции
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Проверяем наличие данных (простая проверка)
if (!empty($_POST)) {
    
    // Защита от спама - проверяем скрытое поле
    if (isset($_POST['notspam']) && $_POST['notspam'] !== 'Not spam') {
        wp_die('Spam detected');
    }
    
    // Получаем данные из формы
    $page_url = isset($_POST['page']) ? sanitize_url($_POST['page']) : 'Unknown page';
    
    // Получаем ответы на вопросы в формате JSON
    $quiz_answers = array();
    if (isset($_POST['quiz_answers'])) {
        $decoded_answers = json_decode(stripslashes($_POST['quiz_answers']), true);
        
        // Фильтруем и валидируем ответы
        if (is_array($decoded_answers)) {
            foreach ($decoded_answers as $questionNum => $data) {
                if (isset($data['question']) && isset($data['answer'])) {
                    // Проверяем, что ответ не пустой
                    $answer = trim($data['answer']);
                    if (!empty($answer)) {
                        $quiz_answers[$questionNum] = array(
                            'question' => sanitize_text_field($data['question']),
                            'answer' => sanitize_text_field($answer)
                        );
                    }
                }
            }
        }
    }
    
    // Сортируем вопросы по номеру (если нужно сохранить порядок из квиза)
    ksort($quiz_answers);
    
    // Формируем текст письма
    $email_subject = 'New Application: ' . get_bloginfo('name');
    
    // Начинаем формировать HTML письмо с кастомными цветами
    $email_body = "<html><body style='font-family: Arial, sans-serif; line-height: 1.6; background-color: #F6F5F2; color: #415A77; margin: 0; padding: 20px;'>";
    
    $email_body .= "<div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>";
    
    // Заголовок
    $email_body .= "<div style='text-align: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #A6CAE2;'>";
    $email_body .= "<h2 style='color: #415A77; margin: 0 0 10px 0;'>New Application</h2>";
    $email_body .= "<p style='color: #7BA1BA; margin: 5px 0;'><strong>Page:</strong> " . esc_html($page_url) . "</p>";
    $email_body .= "<p style='color: #7BA1BA; margin: 5px 0;'><strong>Submission Time:</strong> " . date('Y-m-d H:i:s') . "</p>";
    $email_body .= "</div>";
    
    // Секция с ответами
    if (!empty($quiz_answers) && is_array($quiz_answers)) {
        $email_body .= "<h3 style='color: #415A77; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #D8D5D0;'>Question Answers</h3>";
        
        // Выводим вопросы в формате "Question: Answer"
        foreach ($quiz_answers as $questionNum => $data) {
            if (isset($data['question']) && isset($data['answer'])) {
                $question = sanitize_text_field($data['question']);
                $answer = sanitize_text_field($data['answer']);
                
                // Заменяем переносы строк на <br> для HTML отображения
                $formatted_question = nl2br(htmlspecialchars($question, ENT_QUOTES, 'UTF-8'));
                $formatted_answer = nl2br(htmlspecialchars($answer, ENT_QUOTES, 'UTF-8'));
                
                $email_body .= "<div style='margin-bottom: 20px; padding: 15px; background-color: #ffffff; border: 1px solid #D8D5D0; border-left: 4px solid #5A9B78; border-radius: 4px;'>";
                
                // Вопрос
                $email_body .= "<div style='margin-bottom: 10px;'>";
                $email_body .= "<div style='color: #415A77; font-weight: bold;'>" . $formatted_question . "</div>";
                $email_body .= "</div>";
                
                // Ответ
                $email_body .= "<div>";
                $email_body .= "<div style='color: #415A77; padding: 8px 12px; background-color: #F6F5F2; border-radius: 3px; border-left: 3px solid #CFA573;'>" . $formatted_answer . "</div>";
                $email_body .= "</div>";
                
                $email_body .= "</div>";
            }
        }
    } else {
        $email_body .= "<p style='color: #777; text-align: center;'>No questions were answered.</p>";
    }
    
    $email_body .= "</div>"; // Закрываем основной контейнер
    $email_body .= "</body></html>";
    
    // Получаем email администратора
    $admin_email = get_option('admin_email');
    
    // Дополнительные email (если нужно)
    // $additional_emails = array(
    //     'plahotin.info@gmail.com',
    //     'lana@deessemedia.com'
    // );

    // Дополнительные email из ACF поля
    $additional_emails = array();
    if (function_exists('get_field')) {
        $mail_quiz_items = get_field('mail_quiz_list', 'option');
        
        if (!empty($mail_quiz_items) && is_array($mail_quiz_items)) {
            foreach ($mail_quiz_items as $item) {
                if (!empty($item['mail_quiz_to'])) {
                    $email = sanitize_email(trim($item['mail_quiz_to']));
                    if (is_email($email)) {
                        $additional_emails[] = $email;
                    }
                }
            }
        }
    }

    // Используем только дополнительные email как получателей
    // $recipients = $additional_emails;
    
    // Все получатели
    $recipients = array_merge(array($admin_email), $additional_emails);

    // Удаляем дубликаты
    $recipients = array_unique($recipients);
    
    // Заголовки письма - HTML
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $admin_email . '>'
    );
    
    // Отправляем письмо всем получателям
    $mail_sent = false;
    foreach ($recipients as $recipient) {
        if (is_email($recipient)) {
            $mail_sent = wp_mail($recipient, $email_subject, $email_body, $headers) || $mail_sent;
        }
    }
    
    // Логируем отправку
    error_log('Form submitted from: ' . $page_url);
    error_log('Email sent: ' . ($mail_sent ? 'Yes' : 'No'));
    
    exit;
    
} else {
    // Если нет данных
    wp_die('No data received');
}