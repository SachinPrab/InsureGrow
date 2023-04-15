from flask import Flask, render_template
import requests

app = Flask(__name__, template_folder= "C:\\Users\\User\\Desktop\\microinvestment\\microinvestment 3\\microinvestment-8\\templates")

@app.route('/')
def home():
    # Define the API endpoint URL
    reliance_url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=RELIANCE.BSE&outputsize=full&apikey=Q2DUWBMNUYAWW57M'
    tcs_url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=TCS.BSE&outputsize=full&apikey=Q2DUWBMNUYAWW57M'
     google_url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=GOOGL&outputsize=full&apikey=Q2DUWBMNUYAWW57M'
      reliance_response = requests.get(reliance_url)
    tcs_response = requests.get(tcs_url)
    google_response = requests.get(google_url)
    if reliance_response.status_code == 200 and tcs_response.status_code == 200 and google_response.status_code == 200:

        reliance_data = reliance_response.json()['Time Series (Daily)']
        tcs_data = tcs_response.json()['Time Series (Daily)']
        google_data = google_response.json()['Time Series (Daily)']
       for date, values in reliance_data.items():
            values['1. open'] = float(values['1. open'])
            values['2. high'] = float(values['2. high'])
            values['3. low'] = float(values['3. low'])
            values['4. close'] = float(values['4. close'])
            values['6. volume'] = int(values['6. volume'])
        for date, values in tcs_data.items():
            values['1. open'] = float(values['1. open'])
            values['2. high'] = float(values['2. high'])
            values['3. low'] = float(values['3. low'])
            values['4. close'] = float(values['4. close'])
            values['6. volume'] = int(values['6. volume'])
              for date, values in google_data.items():
            values['1. open'] = float(values['1. open'])
            values['2. high'] = float(values['2. high'])
            values['3. low'] = float(values['3. low'])
            values['4. close'] = float(values['4. close'])
            values['6. volume'] = int(values['6. volume'])

        # Pass the data to the HTML template
        return render_template('ticker.html', reliance_data=reliance_data, tcs_data=tcs_data, google_data=google_data'])
    else:
        # If the request was not successful, return an error message
        return "Error: " + str(response.status_code)


if __name__ == '__main__':
    app.run(debug=True)
