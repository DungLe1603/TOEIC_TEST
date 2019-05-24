
$(document).ready(function(){
  //Display question regarding to specific parts
  $("#js-part-id").on("click", function(){
    var id = $(this).val();
    console.log(id);
    var groupQuestion = $('#js-group-question');
    var hiddenButton = $('#js-add-question');
    var data ="";
    switch (id) {
      case "1":
        data += '<div class="form-group">';
        data += '<label for="picture">Picture *</label>';
        data += '<div id="image-preview"></div>'
        data += '<input id="imgInp" type="file" name="picture" accept="image/gif, image/jpeg, image/png">';
        data += '</div>';
        data += '<div class="form-group">';
        data += '<label for="voice">Voice *</label>';
        data += '<input type="file" name="voice" accept=".mp3,audio/*">';
        data += '</div>';
        data += '<div class="form-group">';
        data += '<label for="content">Content *</label>';
        data += '<input type="text" name="content" class="form-control" value="Mark your answer on your answersheet.">';
        data += '<label for="answer">Answers *</label>';
        data += '<input type="text" name="answer1" class="form-control" value="(A) ">';
        data += '<input type="text" name="answer2" class="form-control" value="(B) ">';
        data += '<input type="text" name="answer3" class="form-control" value="(C) ">';
        data += '<input type="text" name="answer4" class="form-control" value="(D) ">';
        data += '</div>';
        break;
      case "2":
          data += '<div class="form-group">';
          data += '<label for="voice">Voice *</label>';
          data += '<input type="file" name="voice" accept=".mp3,audio/*">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="content">Content *</label>';
          data += '<input type="text" name="content" class="form-control" value="Mark your answer on your answersheet.">';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3" class="form-control" value="(C) ">';
          data += '</div>';
          break;
      case "3":
      case "4":        
          data += '<div class="form-group">';
          data += '<label for="group_qestion">Information type (Email/ Letter/ Advertisement/...)*</label>';
          data += '<input type="text" name="group_qestion" class="form-control">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="voice">Voice *</label>';
          data += '<input type="file" name="voice" accept=".mp3,audio/*">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="content">Question *</label>';
          data += '<input type="text" name="content[]" class="form-control">';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1[]" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2[]" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3[]" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4[]" class="form-control" value="(D) ">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="content">Question *</label>';
          data += '<input type="text" name="content[]" class="form-control">';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1[]" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2[]" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3[]" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4[]" class="form-control" value="(D) ">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="content">Question *</label>';
          data += '<input type="text" name="content[]" class="form-control">';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1[]" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2[]" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3[]" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4[]" class="form-control" value="(D) ">';
          data += '</div>';
          break;
      case "5":
          data += '<div class="form-group">';
          data += '<label for="content">Content *</label>';
          data += '<input type="text" name="content" class="form-control">';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4" class="form-control" value="(D) ">';
          data += '</div>';
          break;
      case "6":
          data += '<div class="form-group">';
          data += '<label for="group_qestion">Information type (Email/ Letter/ Advertisement/...)*</label>';
          data += '<input type="text" name="group_qestion" class="form-control">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="content">Question *</label>';
          data += '<textarea name="content[]" rows="3" class="form-control"></textarea>';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1[]" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2[]" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3[]" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4[]" class="form-control" value="(D) ">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="content">Question *</label>';
          data += '<textarea name="content[]" rows="3" class="form-control"></textarea>';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1[]" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2[]" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3[]" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4[]" class="form-control" value="(D) ">';
          data += '</div>';
          data += '<div class="form-group">';
          data += '<label for="content">Question *</label>';
          data += '<textarea name="content[]" rows="3" class="form-control"></textarea>';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1[]" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2[]" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3[]" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4[]" class="form-control" value="(D) ">';
          data += '</div>';
          break;
      case "7":
          hiddenButton.removeClass('hidden');
          data += '<div class="form-group">';
          data += '<label for="group_qestion">Information type (Email/ Letter/ Advertisement/...)*</label>';
          data += '<input type="text" name="group_qestion" class="form-control">';
          data += '</div>';
          data += '<div class="form-group" id="js-question-form">';
          data += '<label for="content">Question *</label>';
          data += '<input type="text" name="content[]" class="form-control">';
          data += '<label for="answer">Answers *</label>';
          data += '<input type="text" name="answer1[]" class="form-control" value="(A) ">';
          data += '<input type="text" name="answer2[]" class="form-control" value="(B) ">';
          data += '<input type="text" name="answer3[]" class="form-control" value="(C) ">';
          data += '<input type="text" name="answer4[]" class="form-control" value="(D) ">';
          data += '</div>';
          data += '<div id="show-more"></div>'
          break;
      default:
        break;
    }
    groupQuestion.html(data);
  });

  //Display more question for part 7 by clone
  $("#js-add-question").on("click", function(){
    console.log(1);
    $('#js-question-form').clone().appendTo('#show-more');
  });
});
