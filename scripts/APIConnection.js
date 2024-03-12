// OPEN AI's API calls for message generation

async function fetchData() {
    const url = "https://api.openai.com/v1/chat/completions";  // Replace with the correct API endpoint
    const apiKey = "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";

    const data = {
        prompt: "Generate responses saying Hello",
        max_tokens: 150,
        temperature: 0.7,
    };

    try {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${apiKey}`,
            },
            body: JSON.stringify(data),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const responseData = await response.json();
        const generatedText = responseData.choices[0].text;
        console.log(generatedText);
        // Handle the generated text as needed

    } catch (error) {
        console.error("Error:", error);
    }
}

// Call the async function
fetchData();