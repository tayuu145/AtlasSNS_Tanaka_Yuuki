$(function () {
  // [.syncer-acdn]にクリックイベントを設定する
  $('.syncer-acdn').click(function () {
    // [data-target]の属性値を代入する
    var target = $(this).data('target');

    // [target]と同じ名前のIDを持つ要素に[slideToggle()]を実行する
    $('#' + target).slideToggle();

    // 終了
    return false;
  });
});

// $(function () {
//   $('.ac-parent').on('click', function () {
//     $(this).next().slideToggle();
//   });
// });

// $(function () {
//   $('#toggleIcon').on('click', function () {
//     $(this).next().slideToggle();
//   });
// });

alert("Hello");
