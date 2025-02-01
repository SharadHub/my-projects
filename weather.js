async function getWeather() {
    const city = document.getElementById("city").value.trim();
    const weatherInfo = document.getElementById("weatherInfo");
    const errorMessage = document.getElementById("errorMessage");

    // Hide previous results
    weatherInfo.style.display = "none";
    errorMessage.innerText = "";

    if (!city) {
        errorMessage.innerText = "Please enter a city name.";
        return;
    }

    try {
        // Fetch local JSON instead of API for testing
        const response = await fetch("data.json");
        const data = await response.json();

        // Simulate searching for the city in JSON
        if (data.city.toLowerCase() !== city.toLowerCase()) {
            errorMessage.innerText = "City not found in local data.";
            return;
        }

        // Display the weather details
        document.getElementById("cityName").innerText = `${data.city}, ${data.country}`;
        document.getElementById("temperature").innerText = `${data.temperature}°C`;
        document.getElementById("description").innerText = data.description;
        document.getElementById("humidity").innerText = `Humidity: ${data.humidity}%`;
        document.getElementById("windSpeed").innerText = `Wind Speed: ${data.windSpeed} m/s`;

        weatherInfo.style.display = "block"; // Show weather info
    } catch (error) {
        errorMessage.innerText = "Error loading weather data.";
        console.error(error);
    }
}
