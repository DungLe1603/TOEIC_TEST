
$(document).ready(function(){
  //Display question regarding to specific parts
  $("#js-part-id").on("click", function(){
    var id = $(this).val();
    var groupQuestion = $('#js-group-question');
    var hiddenButton = $('#js-add-question');
    var data = '';

    answers = '<label for="answer">Answers (Check for the correct answer)*</label>';
    answers += '<div  class="form-answer">'
    answers += '<input type="radio" name="correct_answer" class="form-radio" value="answer1">'
    answers += '<input type="text" name="answer1" class="form-control" required value="(A) ">';
    answers += '</div>'
    answers += '<div  class="form-answer">'
    answers += '<input type="radio" name="correct_answer" class="form-radio" value="answer1">'
    answers += '<input type="text" name="answer2" class="form-control" required value="(B) ">';
    answers += '</div>'
    answers += '<div  class="form-answer">'
    answers += '<input type="radio" name="correct_answer" class="form-radio" value="answer1">'
    answers += '<input type="text" name="answer3" class="form-control" required value="(C) ">';
    answers += '</div>'

    full_answer = '<div class="form-group">';
    full_answer += answers;
    full_answer += '<div  class="form-answer">'
    full_answer += '<input type="radio" name="correct_answer" class="form-radio" value="answer1">'
    full_answer += '<input type="text" name="answer4" class="form-control" required value="(D) ">';
    full_answer += '</div>'
    full_answer += '</div>';

    picture = '<div class="form-group">';
    picture += '<label for="picture">Picture *</label>';
    picture += '<div id="image-preview"></div>'
    picture += '<input id="imgInp" type="file" name="picture" required accept="image/gif, image/jpeg, image/png">';
    picture += '</div>';

    voice = '<div class="form-group">';
    voice += '<label for="voice">Voice *</label>';
    voice += '<input type="file" name="voice" required accept=".mp3,audio/*">';
    voice += '</div>';

    content = '<div class="form-group">';
    content += '<label for="content">Question *</label>';
    content += '<input type="text" name="content" required class="form-control">';
    content += '</div>';

    content_listen = '<div class="form-group">';
    content_listen += '<label for="content">Question *</label>';
    content_listen += '<input type="text" name="content" class="form-control" required value="Mark your answer on your answersheet.">';
    content_listen += '</div>';

    group = '<div class="form-group">';
    group += '<label for="group_question">Information type (Email/ Letter/ Advertisement/...)*</label>';
    group += '<input type="text" name="group_question" required class="form-control">';
    group += '</div>';

    group_content = '<div class="form-group">';
    group_content += '<label for="content">Question *</label>';
    group_content += '<input type="text" name="content[]" required class="form-control">';
    group_content += '</div>';

    textarea = '<div class="form-group">';
    textarea += '<label for="content">Question *</label>';
    textarea += '<textarea name="content[]" rows="3" class="form-control"></textarea>';
    textarea += '</div>'

    group_answers = '<div class="form-group">';
    group_answers += '<label for="answer">Answers (mark the correct answer)*</label>';
    group_answers += '<div  class="form-answer">'
    group_answers += '<input type="checkbox" name="correct_answer1[]" class="form-radio" value="answer1">'
    group_answers += '<input type="text" name="answer1[]" class="form-control" required value="(A) ">';
    group_answers += '</div>'
    group_answers += '<div  class="form-answer">'
    group_answers += '<input type="checkbox" name="correct_answer2[]" class="form-radio" value="answer2">'
    group_answers += '<input type="text" name="answer2[]" class="form-control" required value="(B) ">';
    group_answers += '</div>'
    group_answers += '<div  class="form-answer">'
    group_answers += '<input type="checkbox" name="correct_answer3[]" class="form-radio" value="answer3">'
    group_answers += '<input type="text" name="answer3[]" class="form-control" required value="(C) ">';
    group_answers += '</div>'
    group_answers += '<div  class="form-answer">'
    group_answers += '<input type="checkbox" name="correct_answer4[]" class="form-radio" value="answer4">'
    group_answers += '<input type="text" name="answer4[]" class="form-control" required value="(D) ">';
    group_answers += '</div>'
    group_answers += '</div>';

    switch (id) {
      case "1":
        data = picture + voice + content_listen + full_answer;
        break;
      case "2":
        data = voice + content_listen + answers;
        break;
      case "3":
      case "4":
        data = group + voice;
        data += (group_content + group_answers);
        data += (group_content + group_answers);
        data += (group_content + group_answers);
        break;
      case "5":
        data = content + full_answer;
        break;
      case "6":
        data = group;
        data += (textarea + group_answers);
        data += (textarea + group_answers);
        data += (textarea + group_answers);
        break;
      case "7":
          hiddenButton.removeClass('hidden');
          data += group + picture;
          data += '<div id="js-question-form">';
          data += (group_content + group_answers);
          data += '</div>'
          break;
      default:
        break;
    }
    groupQuestion.html(data);
  });

  //Display more question for part 7 by clone
  $("#js-add-question").on("click", function(){
    add_data = group_content + group_answers;
    $(group_content + group_answers).appendTo('#js-question-form');
  });
});
