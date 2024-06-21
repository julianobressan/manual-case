# MANUAL - Case by Juliano Bressan

## API Endpoints

### Get all questions and answers
`GET` `/questions`
#### Response
```json
{
    "data": [
        {
            "id": "1",
            "query": "Do you have difficulty getting or maintaining an erection?",
            "answers": [
                {
                    "id": 1,
                    "order": 1,
                    "answer": "Yes"
                },
                {
                    "id": 2,
                    "order": 2,
                    "answer": "No"
                }
            ]
        },
        {
            "id": "2",
            "query": "Have you tried any of the following treatments before?",
            "answers": [
                {
                    "id": 1,
                    "order": 1,
                    "answer": "Viagra or Sildenafil"
                },
                {
                    "id": 2,
                    "order": 2,
                    "answer": "None of the above"
                }
            ]
        },
        {
            "id": "2A",
            "query": "Was the Viagra or Sildenafil product you tried before effective?",
            "answers": [
                {
                    "id": 1,
                    "order": 1,
                    "answer": "Yes"
                },
                {
                    "id": 2,
                    "order": 2,
                    "answer": "No"
                }
            ]
        }
    ]
}
```

### Get a question and answers
`GET` `/questions/{id}`
#### Response
```json
{
    "data": 
    {
        "id": "1",
        "query": "Do you have difficulty getting or maintaining an erection?",
        "answers": [
            {
                "id": 1,
                "order": 1,
                "statement": "Yes"
            },
            {
                "id": 2,
                "order": 2,
                "statement": "No"
            }
        ]
    }
}
```

### Answer a question
`POST` `/questions/{id}/`
#### Body
```json
{
    "payload": {
        "answer_id": 1
    }
}
```
#### Response
```json
{
    "data": {
        "next_question": 5,
        "recommended_products": [
            "sildenafil_10"
        ]
    }
}
```

### Create a question with answers
`POST` `/questions`
#### Body
```json
{
    "payload": {
        "question": "Do you have difficulty getting or maintaining an erection?",
        "answers": [
            {
                "order": 1,
                "statement": "Yes"
            },
            {
                "order": 2,
                "statement": "No"
            }
        ]
    }
}
```

### Delete a question
`DELETE` `/questions/{id}`
#### Empty response

### Increase order of question
`PATCH` `/questions/{id}/increaseOrder`

### Decrease order of question
`PATCH` `/questions/{id}/decreaseOrder`
