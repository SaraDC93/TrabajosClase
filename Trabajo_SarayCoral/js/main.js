const API_URL = "http://localhost:8000";
let token = localStorage.getItem("token");
let role = localStorage.getItem("role");

// REGISTRO DE USUARIO CON VALIDACIONES
async function register() {
    const name = document.getElementById('register-name').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;

    try {
        const response = await fetch(`${API_URL}/api/register.php`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nombre: name, email: email, password: password })
        });

        const result = await response.json();
        
        if (result.status === 'success') {
            alert("Usuario registrado con éxito");
        } else {
            alert("Error al registrar el usuario: " + result.message);
        }
    } catch (error) {
        console.error("Error en el registro:", error);
    }
}

// LOGIN Y GUARDADO DE TOKEN Y ROL
// LOGIN Y GUARDADO DE TOKEN Y ROL
async function login() {
    const email = document.getElementById("login-email").value;
    const password = document.getElementById("login-password").value;

    const response = await fetch(`/api/login.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password })
    });

    const data = await response.json();
    
    if (data.token) {
        // Guardar token y rol en el almacenamiento local
        localStorage.setItem("token", data.token);
        localStorage.setItem("role", data.role); // Guardar el rol
        token = data.token;
        role = data.role;

        // Cambiar la visibilidad de los elementos
        document.getElementById("auth").style.display = "none";
        document.getElementById("content").style.display = "block";

        // Redirigir a la página del dashboard (o la página que prefieras)
        window.location.href = "inicio.html"; // Cambia esto al nombre de tu página de destino

    } else {
        alert(data.error);
    }
}


// VALIDACIONES DE EMAIL Y CONTRASEÑA
function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validatePassword(password) {
    return /^(?=.*[A-Z])(?=.*\d).{8,}$/.test(password);
}

// CERRAR SESIÓN
function logout() {
    localStorage.removeItem("token");
    localStorage.removeItem("role");
    token = null;
    role = null;
    if (document.getElementById("auth")) {
        document.getElementById("auth").style.display = "block";
    }
    if (document.getElementById("content")) {
        document.getElementById("content").style.display = "none";
    }
}

// OBTENER PELÍCULAS
async function getPeliculas() {
    try {
        const response = await fetch(`${API_URL}/api/peliculas.php`, {
            method: "GET",
            headers: { "Authorization": `Bearer ${token}` }
        });

        const data = await response.json();
        console.log("Respuesta del servidor (películas):", data);

        if (Array.isArray(data) && data.length === 0) {
            console.warn("No hay películas disponibles.");
            return;
        }

        if (data.status === "success") {
            console.log("Películas cargadas:", data.peliculas);
        } else {
            console.error("Error al cargar películas:", data.message || "Respuesta inesperada");
        }
    } catch (error) {
        console.error("Error al obtener películas:", error);
    }
}

async function getAlquileres() {
    try {
        const response = await fetch(`${API_URL}/api/alquileres.php`, {
            method: "GET",
            headers: { "Authorization": `Bearer ${token}` }
        });

        const data = await response.json();
        console.log("Respuesta del servidor (alquileres):", data);

        if (Array.isArray(data) && data.length === 0) {
            console.warn("No hay alquileres disponibles.");
            return;
        }

        if (data.status === "success") {
            console.log("Alquileres cargados:", data.alquileres);
        } else {
            console.error("Error al cargar alquileres:", data.message || "Respuesta inesperada");
        }
    } catch (error) {
        console.error("Error al obtener alquileres:", error);
    }
}


// CARGAR PELÍCULAS Y ALQUILERES AL INICIAR
document.addEventListener("DOMContentLoaded", () => {
    if (token) {
        getPeliculas();
        getAlquileres();
    }
});
