import requests
url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=RELIANCE.BSE&outputsize=full&apikey=Q2DUWBMNUYAWW57M'
r = requests.get(url)
data = r.json()
print(data)
