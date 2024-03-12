const OPENAI_API_KEY = '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';

async function chatWithOpenAI() {
    const requestBody = {
        model: "gpt-3.5-turbo",
        messages: [{ role: "user", content: "can you tell me about Japanese seiyuus?" }],
    };

    try {
        const response = await fetch('https://api.openai.com/v1/chat/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${OPENAI_API_KEY}`
            },
            body: JSON.stringify(requestBody)
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        console.log(data);
        console.log(data.choices[0].message.content);
        const repsonseObject = document.getElementById('response');
        repsonseObject.textContent = data.choices[0].message.content;
        // Handle response data here

    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

// Call the async function
chatWithOpenAI();
