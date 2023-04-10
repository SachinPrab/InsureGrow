// Select the ticker element
const ticker = document.getElementById('ticker');

// Loop through the data array and create a ticker item for each day
data.forEach((day) => {
	// Extract the date and prices for the day
	const date = day['date'];
	const open = day['open'];
	const high = day['high'];
	const low = day['low'];
	const close = day['close'];

	// Create a ticker item for the day
	const tickerItem = document.createElement('div');
	tickerItem.classList.add('ticker-item');
	tickerItem.innerHTML = `${date} - Open: ${open}, High: ${high}, Low: ${low}, Close: ${close}`;

	// Add the ticker item to the ticker
	ticker.appendChild(tickerItem);
});

// Create a function to scroll the ticker
function scrollTicker() {
	// Move the first item in the ticker to the end
	ticker.appendChild(ticker.firstChild);
}

// Set the scroll interval (in milliseconds)
const scrollInterval = 3000;

// Set the ticker scrolling interval
setInterval(scrollTicker, scrollInterval);
