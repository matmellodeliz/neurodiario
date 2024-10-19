
let nav = 0;
let clicked = null;
let events = [];
$.ajax({
    url: "buscar_dados.php",
    dataType: "json",
    async: false,
    success: function(data) {
      events = data;
    }
});

const calendar = document.getElementById('calendar');
const newEventModal = document.getElementById('newEventModal');
const deleteEventModal = document.getElementById('deleteEventModal');
const backDrop = document.getElementById('modalBackDrop');
const eventTitleInput = document.getElementById('eventTitleInput');
const diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];

function openModal(date) {
  clicked = date;

  const eventForDay = events.find(e => e.date === clicked);

  if (eventForDay) {
    document.getElementById('eventText').innerText = eventForDay.title;
    deleteEventModal.style.display = 'block';
  } else {
    newEventModal.style.display = 'block';
  }

  backDrop.style.display = 'block';
}

function load() {
  const dt = new Date();

  if (nav !== 0) {
    dt.setMonth(new Date().getMonth() + nav);
  }

  const day = dt.getDate();
  const month = dt.getMonth();
  const year = dt.getFullYear();

  const primeiroDiaDoMes = new Date(year, month, 1);
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  console.log();


  document.getElementById('monthDisplay').innerText = 
    `${dt.toLocaleDateString('pt-br', { month: 'long' })} ${year}`;
  let j = dt.getDay();
  calendar.innerHTML = '';
  for(let i = 1, j = primeiroDiaDoMes.getDay();i <= daysInMonth; i++, j++) {
    if(j == 7) j = 0;
    const daySquare = document.createElement('div');
    daySquare.classList.add('day');

    const dayString = `${month + 1}/${i}/${year}`;
    
    daySquare.innerText = i + ' - ' + diaSemana[j];
    const eventForDay = events.find(e => e.date === dayString);

    if (i === day && nav === 0) {
      daySquare.id = 'currentDay';
    }

    if (eventForDay) {
      const eventDiv = document.createElement('div');
      eventDiv.classList.add('event');
      eventDiv.innerText = eventForDay.title;
      daySquare.appendChild(eventDiv);
    }

    daySquare.addEventListener('click', () => openModal(dayString));
    

    calendar.appendChild(daySquare);    
  }
}

function closeModal() {
  eventTitleInput.classList.remove('error');
  newEventModal.style.display = 'none';
  deleteEventModal.style.display = 'none';
  backDrop.style.display = 'none';
  eventTitleInput.value = '';
  clicked = null;
  load();
}

function saveEvent() {
  if (eventTitleInput.value) {
    eventTitleInput.classList.remove('error');

    events.push({
      date: clicked,
      title: eventTitleInput.value,
    });
    $.ajax({
      type: "POST",
      url: "salvar_evento.php",
      data: {
        date: clicked,
        title: eventTitleInput.value
      },
      success: function(response) {
        console.log("Resposta:", response);
      },
      error: function(xhr, status, error) {
        console.error("Erro:", xhr, status, error);
      }
    });
    localStorage.setItem('events', JSON.stringify(events));
    closeModal();
  } else {
    eventTitleInput.classList.add('error');
  }
}

function deleteEvent() {
  events = events.filter(e => e.date !== clicked);
  localStorage.setItem('events', JSON.stringify(events));
  $.ajax({
    type: "POST",
    url: "excluir_evento.php",
    data: {
      date: clicked
    },
    success: function(response) {
      console.log("Resposta:", response);
    },
    error: function(xhr, status, error) {
      console.error("Erro:", xhr, status, error);
    }
  });
  closeModal();
}

function initButtons() {
  document.getElementById('nextButton').addEventListener('click', () => {
    nav++;
    load();
  });

  document.getElementById('backButton').addEventListener('click', () => {
    nav--;
    load();
  });

  document.getElementById('saveButton').addEventListener('click', saveEvent);
  document.getElementById('cancelButton').addEventListener('click', closeModal);
  document.getElementById('deleteButton').addEventListener('click', deleteEvent);
  document.getElementById('closeButton').addEventListener('click', closeModal);
}

initButtons();
load();
