// Importamos el módulo readline para leer datos del usuario
const readline = require('readline');

// Configuramos la interfaz de readline
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

// Definimos la función para convertir Celsius a Fahrenheit
function convertirACelsius(celsius) {
    return celsius * 1.8 + 32;
}

// Pedimos al usuario el valor en Celsius
rl.question("Ingresa la temperatura en grados Celsius: ", (input) => {
    let celsius = parseFloat(input);

    // Validamos si el usuario ingresó un número válido
    if (!isNaN(celsius)) {
        let resultado = convertirACelsius(celsius);
        console.log(`${celsius} grados Celsius son ${resultado.toFixed(2)} grados Fahrenheit.`);
    } else {
        console.log("Por favor, ingresa un número válido.");
    }

    // Cerramos la interfaz
    rl.close();
});
