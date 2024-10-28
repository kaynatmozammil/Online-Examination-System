const questions = [
    { question: "What is 2 + 2?", options: ["3", "4", "5", "6"], answer: "4" },
    { question: "What is the capital of France?", options: ["Berlin", "Paris", "Rome", "Madrid"], answer: "Paris" },
  ];
  
  const questionContainer = document.getElementById('question-container');
  
  questions.forEach((q, index) => {
    const questionElement = document.createElement('div');
    questionElement.innerHTML = `
      <p>${index + 1}. ${q.question}</p>
      ${q.options.map((opt, i) => `
        <label>
          <input type="radio" name="question${index}" value="${opt}">
          ${opt}
        </label>
      `).join('')}
    `;
    questionContainer.appendChild(questionElement);
  });
  
  document.getElementById('examForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let score = 0;
    questions.forEach((q, index) => {
      const selected = document.querySelector(`input[name="question${index}"]:checked`);
      if (selected && selected.value === q.answer) {
        score++;
      }
    });
    alert('You scored ' + score + '/' + questions.length);
  });
  