// Define the API endpoint URL
const url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=RELIANCE.BSE&outputsize=full&apikey=Q2DUWBMNUYAWW57M';

// Fetch the data from the API endpoint
fetch(url)
	.then(response => response.json())
	.then(data => {
		// Get the time series data
		const timeSeriesData = data['Time Series (Daily)'];

		// Get an array of dates
		const dates = Object.keys(timeSeriesData);

		// Create an array of objects with date and price information
		const priceData = dates.map(date => ({
			date: date,
			open: timeSeriesData[date]['1. open'],
			high: timeSeriesData[date]['2. high'],
			low: timeSeriesData[date]['3. low'],
			close: timeSeriesData[date]['4. close']
		}));

		// Get the ticker element
		const ticker = document.getElementById('ticker');

		// Loop through the data array and create a ticker item for each day
		priceData.forEach((day) => {
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
		setInterval(scrollTicker,
