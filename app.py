from flask import Flask, render_template
import requests

app = Flask(__name__)

@app.route('/stock.html')
def home():
    # Define the API endpoint URL
    url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=RELIANCE.BSE&outputsize=full&apikey=Q2DUWBMNUYAWW57M"

    # Send a GET request to the API endpoint
    response = requests.get(url)

    # If the request was successful (status code 200)
    if response.status_code == 200:
        # Extract the JSON response data
        data = response.json()

        # Pass the data to the HTML template
        return render_template('stocks.html', data=data)
    else:
        # If the request was not successful, return an error message
        return "Error: " + str(response.status_code)

if __name__ == '__main__':
    app.run(debug=True)
