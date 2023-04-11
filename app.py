from flask import Flask, render_template
import requests

app = Flask(__name__, template_folder= "C:\\Users\\User\\Desktop\\microinvestment\\microinvestment 3\\microinvestment-8\\templates")

@app.route('/')
def home():
    # Define the API endpoint URL
    url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=RELIANCE.BSE&outputsize=full&apikey=Q2DUWBMNUYAWW57M'
    r = requests.get(url)
    data = r.json()
    for date, values in data['Time Series (Daily)'].items():
        values['1. open'] = float(values['1. open'])
        values['2. high'] = float(values['2. high'])
        values['3. low'] = float(values['3. low'])
        values['4. close'] = float(values['4. close'])
    # Send a GET request to the API endpoint
    response = requests.get(url)

    # If the request was successful (status code 200)
    if response.status_code == 200:
        # Extract the JSON response data
        data = response.json()
        # Pass the data to the HTML template
        return render_template('ticker.html', data=data['Time Series (Daily)'])
    else:
        # If the request was not successful, return an error message
        return "Error: " + str(response.status_code)


if __name__ == '__main__':
    app.run(debug=True)
