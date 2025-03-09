<?php

    require(__DIR__ . '/../../Connection/connection.php');
    require("../../Models/User.php");
    require("../../Models/Question.php");
    require_once("../../Models/UserSkeleton.php");
    require_once("../../Models/QuestionSkeleton.php");

    
    class Seeder{
        
        public static function seed_users($conn) {

            $users = [
                        [
                            'full_name' => 'Sarah Jamal',
                            'email' => 'sarahjamal6@gmail.com',
                            'password' => 'tigerlake12'
                        ],[
                            'full_name' => 'Ahmed Khaled',
                            'email' => 'ahmedkhaled8@gmail.com',
                            'password' => 'blueberry9'
                        ],[
                            'full_name' => 'Maya Hassan',
                            'email' => 'mayahassan4@gmail.com',
                            'password' => 'quickfox11'
                        ],[
                            'full_name' => 'Omar Ziad',
                            'email' => 'omarziad3@gmail.com',
                            'password' => 'silverstar8'
                        ],[
                            'full_name' => 'Layla Noor',
                            'email' => 'laylanoor7@gmail.com',
                            'password' => 'forestmoon10'
                        ],[
                            'full_name' => 'Hassan Rami',
                            'email' => 'hassanrami2@gmail.com',
                            'password' => 'redsky99'
                        ],[
                            'full_name' => 'Farah Sami',
                            'email' => 'farahsami5@gmail.com',
                            'password' => 'sunsetwave8'
                        ],[
                            'full_name' => 'Kareem Adel',
                            'email' => 'kareemadel9@gmail.com',
                            'password' => 'goldenkey12'
                        ],[
                            'full_name' => 'Nour Yassin',
                            'email' => 'nouryassin1@gmail.com',
                            'password' => 'stormcloud10'
                        ],[
                            'full_name' => 'Yousef Omar',
                            'email' => 'yousefomar6@gmail.com',
                            'password' => 'brightrise9'
                        ]
                ];

            foreach($users as $user) {
                $user_object = new UserSkeleton($user['full_name'], $user['email'], $user['password']);
                User::createUser($user_object, $conn);
            }
        }

        public static function seed_questions($conn) {

            $questions = [
                            [
                                'question' => 'What is prompt engineering?',
                                'answer' => 'Prompt engineering is the process of crafting effective prompts to guide Large Language Models (LLMs) like ChatGPT in generating accurate, relevant, and structured responses.'
                            ],
                            [
                                'question' => 'What is a prompt pattern?',
                                'answer' => 'A prompt pattern is a structured approach to designing prompts, acting as a reusable solution for specific problems in prompt engineering.'
                            ],
                            [
                                'question' => 'Why is prompt engineering important?',
                                'answer' => 'Effective prompt engineering ensures that users receive useful and high-quality outputs from LLMs by structuring their inputs correctly.'
                            ],
                            [
                                'question' => 'How do users commonly make mistakes when prompting LLMs?',
                                'answer' => 'Users often input vague, incomplete, or overly complex prompts, leading to incorrect or unhelpful responses from the model.'
                            ],
                            [
                                'question' => 'What are the main components of a well-defined prompt pattern?',
                                'answer' => 'Each prompt pattern includes an Intent, Motivation, Structure & Key Ideas, Example Implementation, and Consequences.'
                            ],
                            [
                                'question' => 'What are the six main categories of prompt patterns?',
                                'answer' => 'The six main categories are Input Semantics, Output Customization, Error Identification, Prompt Improvement, Interaction, and Context Control.'
                            ],
                            [
                                'question' => 'What is the "Meta Language Creation" pattern in Input Semantics?',
                                'answer' => 'This pattern involves defining a custom language or format that the LLM can follow, improving consistency and clarity in responses.'
                            ],
                            [
                                'question' => 'How does the "Output Automator" pattern help in Output Customization?',
                                'answer' => 'It structures prompts to generate predefined, automated responses, reducing manual effort in refining outputs.'
                            ],
                            [
                                'question' => 'What is the "Persona" pattern?',
                                'answer' => 'It involves instructing the LLM to respond in a specific character, profession, or tone, making outputs more relevant to the intended audience.'
                            ],
                            [
                                'question' => 'How does the "Visualization Generator" pattern work?',
                                'answer' => 'This pattern structures prompts to generate descriptions, ASCII art, or code for visualization purposes, useful in design or education.'
                            ],
                            [
                                'question' => 'What is the "Fact Check List" pattern in Error Identification?',
                                'answer' => 'It instructs the LLM to verify facts before generating a response, helping reduce misinformation.'
                            ],
                            [
                                'question' => 'How does the "Reflection" pattern improve responses?',
                                'answer' => 'It prompts the LLM to self-analyze and refine its answer by questioning its accuracy and logic.'
                            ],
                            [
                                'question' => 'What is the "Question Refinement" pattern in Prompt Improvement?',
                                'answer' => 'It helps users reformulate vague or ambiguous questions to get more precise and useful responses.'
                            ],
                            [
                                'question' => 'What does the "Alternative Approaches" pattern do?',
                                'answer' => 'This pattern encourages the LLM to generate multiple possible answers or solutions to a problem, broadening the user’s choices.'
                            ],
                            [
                                'question' => 'What is the "Cognitive Verifier" pattern?',
                                'answer' => 'It asks the LLM to cross-check its own output for logical consistency before finalizing an answer.'
                            ],
                            [
                                'question' => 'How does the "Flipped Interaction" pattern improve engagement?',
                                'answer' => 'It reverses roles by making the LLM ask the user questions instead of answering directly, useful in tutoring and brainstorming.'
                            ],
                            [
                                'question' => 'What is the "Game Play" pattern in Interaction?',
                                'answer' => 'It structures prompts to create interactive games, quizzes, or puzzles within ChatGPT responses.'
                            ],
                            [
                                'question' => 'How does the "Context Manager" pattern enhance conversations?',
                                'answer' => 'It maintains and references prior context in multi-turn conversations, preventing loss of important details.'
                            ],
                            [
                                'question' => 'Can different prompt patterns be combined?',
                                'answer' => 'Yes, combining patterns can solve complex problems that a single pattern alone might not address effectively.'
                            ],
                            [
                                'question' => 'Has prompt engineering evolved since this research was conducted?',
                                'answer' => 'Yes, new patterns have likely emerged, and existing ones may have been refined as LLMs improve and user needs evolve.'
                            ]                
                    ];
            foreach($questions as $question) {
               $question_object = new QuestionSkeleton($question['question'], $question['answer']);
               Question::createQuestion($question_object, $conn);
            }
        }
    }
    Seeder::seed_users($conn);
    Seeder::seed_questions($conn);
?>