const apiUrl = '/api/'; // Ruta base para los endpoints de la API

// Elementos del DOM
const registerForm = document.getElementById('registerForm');
const loginForm = document.getElementById('loginForm');
const bookForm = document.getElementById('bookForm');
const booksContainer = document.getElementById('booksContainer');
const authSection = document.getElementById('auth');
const booksSection = document.getElementById('books');
const logoutButton = document.getElementById('logoutButton');

// Manejo de Registro
registerForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch(apiUrl + 'register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, email, password }),
    });

    const result = await response.json();
    alert(result.message || result.error);
});

// Manejo de Inicio de Sesión
loginForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    const response = await fetch(apiUrl + 'login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password }),
    });

    const result = await response.json();
    console.log(result);
    if (result.userId) {
            localStorage.setItem('userId', result.userId); // Almacena el ID de usuario
    }else{
        console.log("Usuario no encontrado");
    }
    if (result.message) {
        alert(result.message);
        toggleSections(true); // Mostrar sección de libros
        loadbooks(); // Cargar libros del usuario
    } else {
        alert(result.error);
    }
});

// Manejo de Cierre de Sesión
logoutButton.addEventListener('click', async () => {
    //Borra el id del usuario
    localStorage.removeItem("userId");
    const response = await fetch(apiUrl + 'logout.php', { method: 'POST' });
    const result = await response.json();
    alert(result.message || result.error);
    toggleSections(false); // Volver a mostrar la sección de autenticación
});

// Crear Libro
bookForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const title = document.getElementById('bookTitle').value;
    const author = document.getElementById('bookAuthor').value;
    const due_date = document.getElementById('bookDueDate').value;

    const response = await fetch(apiUrl + 'books.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ title, author, due_date }),
    });
    

    const result = await response.json();
    alert(result.message || result.error);
    loadBooks(); // Recargar los libros
});

// Cargar libros
async function loadbooks() {
    const response = await fetch(apiUrl + 'books.php');
    const books = await response.json();

    // Limpiar el contenedor de libros
    booksContainer.innerHTML = '';

    if (books.error) {
        booksContainer.innerHTML = '<li>Error al cargar los libros.</li>';
        return;
    }

    // Renderizar libros
    books.forEach(book => {
        const li = document.createElement('li');
        li.innerHTML = `
            <strong>${book.title}</strong> - ${book.author} - ${book.due_date} 
            [${book.status}]
            <div id="radio_${book.id}">
                <input type="radio" id="r1${book.id}" name="book_status${book.id}" value="Pendiente">
                <label for="Pendiente">Pendiente</label>
                <input type="radio" id="r2${book.id}" name="book_status${book.id}" value="Leyendo">
                <label for="Leyendo">Leyendo</label>
                <input type="radio" id="r3${book.id}" name="book_status${book.id}" value="Finalizado">
                <label for="Finalizado">Finalizado</label>
            </div>
            <button onclick="updatebook(${book.id})">Cambiar</button>
            <button onclick="deleteBook(${book.id})">Eliminar</button>
        `;
        booksContainer.appendChild(li);
    });
    
}

// Actualizar Estado de un libro
async function updatebook(id) {
    var radio_buttons = document.getElementsByName('book_status'.concat(id));
    var status;
    for(var i = 0; i < radio_buttons.length; i++){
    if(radio_buttons[i].checked){
        status = radio_buttons[i].value;
        }
    }   
    const response = await fetch(apiUrl + 'books.php', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, status }),
    });

    const result = await response.json();
    alert(result.message || result.error);
    loadbooks(); // Recargar las libros
}

async function deleteBook(id) {
    if (!id) {
        alert("ID del libro no proporcionado");
        return;
    }

    const response = await fetch(apiUrl + 'books.php', {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id }),
    });

    const result = await response.json();
    alert(result.message || result.error);
    
    loadbooks(); // Recargar los libros
}

// Alternar entre las secciones de autenticación y libros
function toggleSections(isLoggedIn) {
    if (isLoggedIn) {
        authSection.style.display = 'none';
        booksSection.style.display = 'block';
    } else {
        authSection.style.display = 'block';
        booksSection.style.display = 'none';
    }
}

// Inicialización
toggleSections(false); // Mostrar sección de autenticación al cargar la página
window.deleteBook = deleteBook;
