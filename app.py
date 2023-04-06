from flask import Flask, render_template
import requests

app = Flask(__name__)

@app.route('/')
def home():
    # Define the API endpoint URL
    url = "https://jsonplaceholder.typicode.com/todos/1"

    # Send a GET request to the API endpoint
    response = requests.get(url)

    # If the request was successful (status code 200)
    if response.status_code == 200:
        # Extract the JSON response data
        data = response.json()

        # Pass the data to the HTML template
        return render_template('index.html', data=data)
    else:
        # If the request was not successful, return an error message
        return "Error: " + str(response.status_code)

if __name__ == '__main__':
    app.run(debug=True)
