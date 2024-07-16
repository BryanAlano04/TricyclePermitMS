document.addEventListener('DOMContentLoaded', function() {
    var formSteps = document.querySelectorAll('.form-step');
    var formProgress = document.querySelector('.form-progress-bar');
    var progressIndicators = document.querySelectorAll('.form-progress-indicator');
    var currentStep = 0;
  
    function showStep(step) {
      formSteps.forEach(function(stepElem, index) {
        if (index === step) {
          stepElem.classList.remove('hidden');
          stepElem.classList.add('active');
          progressIndicators[index].classList.add('active');
        } else {
          stepElem.classList.add('hidden');
          stepElem.classList.remove('active');
          progressIndicators[index].classList.remove('active');
        }
      });
  
      var progressValue = (step / (formSteps.length - 1)) * 100;
      formProgress.value = progressValue;
    }
  
    document.querySelectorAll('.form-step form').forEach(function(formElem, index) {
      formElem.addEventListener('submit', function(event) {
        event.preventDefault();
        if (index < formSteps.length - 1) {
          currentStep++;
          showStep(currentStep);
        }
      });
    });
  
    document.querySelectorAll('.js-reset').forEach(function(resetButton) {
      resetButton.addEventListener('click', function() {
        currentStep = 0;
        showStep(currentStep);
      });
    });
  
    showStep(currentStep);
  });
  