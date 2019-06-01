
$(document).ready(function(){
  var key;

  answers = '<label for="answer">Answers (Check for the correct answer)*</label>';
  answers += '<div  class="form-answer">';
  answers += '<input type="radio" name="correct_answer" class="form-radio" value="0">';
  answers += '<input type="text" name="answer[]" class="form-control" required value="(A) ">';
  answers += '</div>';
  answers += '<div  class="form-answer">';
  answers += '<input type="radio" name="correct_answer" class="form-radio" value="1">';
  answers += '<input type="text" name="answer[]" class="form-control" required value="(B) ">';
  answers += '</div>';
  answers += '<div  class="form-answer">';
  answers += '<input type="radio" name="correct_answer" class="form-radio" value="2">';
  answers += '<input type="text" name="answer[]" class="form-control" required value="(C) ">';
  answers += '</div>';

  full_answer = '<div class="form-group">';
  full_answer += answers;
  full_answer += '<div  class="form-answer">';
  full_answer += '<input type="radio" name="correct_answer" class="form-radio" value="3">';
  full_answer += '<input type="text" name="answer[]" class="form-control" required value="(D) ">';
  full_answer += '</div>';
  full_answer += '</div>';

  picture = '<div class="form-group">';
  picture += '<label for="picture">Picture *</label>';
  picture += '<div id="image-preview"></div>';
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
  textarea += '</div>';
  
  var group_answers = function(key) {
    gr = '<div class="form-group">';
    gr += '<label for="answer">Answers (mark the correct answer)*</label>';
    gr += '<div  class="form-answer">';
    gr += '<input type="radio" name="correct_answer[' + key + ']" class="form-radio" value="0">';
    gr += '<input type="text" name="answer[' + key + '][]" class="form-control" required value="(A) ">';
    gr += '</div>'
    gr += '<div  class="form-answer">';
    gr += '<input type="radio" name="correct_answer[' + key + ']" class="form-radio" value="1">';
    gr += '<input type="text" name="answer[' + key + '][]" class="form-control" required value="(B) ">';
    gr += '</div>'
    gr += '<div  class="form-answer">';
    gr += '<input type="radio" name="correct_answer[' + key + ']" class="form-radio" value="2">';
    gr += '<input type="text" name="answer[' + key + '][]" class="form-control" required value="(C) ">';
    gr += '</div>'
    gr += '<div  class="form-answer">';
    gr += '<input type="radio" name="correct_answer[' + key + ']"  class="form-radio" value="3">';
    gr += '<input type="text" name="answer[' + key + '][]" class="form-control" required value="(D) ">';
    gr += '</div>'
    gr += '</div>';
    return gr;
  }

  //Display question regarding to specific parts
  $("#js-part-id").on("click", function(){
    var id = $(this).val();
    var groupQuestion = $('#js-group-question');
    var hiddenButton = $('#js-add-question');    
    var hid = hiddenButton.attr('data-hidden');
    var data = '';
    key = 0;
    if (hid == '') {            
      hiddenButton.addClass('hidden');
      hiddenButton.attr('data-hidden', 'hidden');
    }
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
        data += (group_content + group_answers(key++));
        data += (group_content + group_answers(key++));
        data += (group_content + group_answers(key++));
        break;
      case "5":
        data = content + full_answer;
        break;
      case "6":
        data = group;
        data += (textarea + group_answers(key++));
        data += (textarea + group_answers(key++));
        data += (textarea + group_answers(key++));
        break;
      case "7":
          if (hid == 'hidden') {            
            hiddenButton.removeClass('hidden');
            hiddenButton.attr('data-hidden', '');
          }
          data += group + picture;
          data += '<div id="js-question-form">';
          data += (group_content + group_answers(key++));
          data += '</div>'
          break;
      default:
        break;
    }
    groupQuestion.html(data);
  });

  // Display more question for part 7 by clone
  $("#js-add-question").on("click", function(){
    add_data = group_content + group_answers(key++);
    $(add_data).appendTo('#js-question-form');
  });
});
