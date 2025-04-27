
<style>
  /* General styles */
html, body {
    margin: 0;
    padding: 0;
    width: 100%;
    overflow-x: hidden; /* Prevent horizontal overflow */
}

.container {
    max-width: 100%;
    padding: 0 15px; /* Add padding to prevent content from touching edges on mobile */
    box-sizing: border-box;
}

/* Heading styles */
h1 {
    color: #17a2b8;
    font-size: 2.5rem; /* Responsive font size */
}
h2 {
    color: #007bff;
    font-size: 1.5rem; /* Responsive font size */
}

h3 {
    color: #17a2b8;
    font-size: 1.25rem; /* Responsive font size */
}

/* Responsive videos */
iframe {
    max-width: 100%;
    height: auto; /* Maintain aspect ratio */
}

/* Spacing and layout adjustments */
.mt-4 {
    margin-top: 1.5rem; /* Add top margin for spacing */
}

ul, ol {
    padding-left: 1.5rem; /* Adjust padding for lists */
}

strong {
    display: block; /* Make strong elements block for better readability */
    margin-top: 0.5rem; /* Add spacing above strong elements */
}

.col-md-6 {
    margin-bottom: 1.5rem; /* Add bottom margin for spacing between columns */
}

/* Adjustments for small screens */
@media (max-width: 768px) {
    h2 {
        font-size: 1.25rem; /* Smaller font size for smaller screens */
    }

    h3 {
        font-size: 1.125rem; /* Smaller font size for smaller screens */
    }

    .container {
        padding: 0 10px; /* Adjust padding for smaller screens */
    }

    .row {
        margin-right: 0;
        margin-left: 0;
    }
}

    </style>
 

<?php
$contentDivider = '
<style>
    hr.custom-divider {
        border: none;
        height: 5px; /* Thickness of the divider */
        background-color: #ccc; /* Grey color */
        margin: 20px 0; /* Spacing above and below the divider */
    }
</style>
<hr class="custom-divider">';

$chapterAssociativeArray = [
    "Introduction" => "introduction",
    "Introduction to Fasting" => "introductionToFasting",
    "Getting Started with Fasting" => "gettingStartedWithFasting",
    "Ketosis and Autophagy" => "ketosisAndAutophagy",
    "Fasting Benefits" => "fastingBenefits",
    "Low-Carb and No-Carb Diets" => "lowCarbAndNoCarbDiets",
    "Exercise During Fasting" => "exerciseDuringFasting",
    "Myths and Misconceptions" => "mythsAndMisconceptions",
    "Biochemical Insights" => "biochemicalInsights",
    "Advanced Fasting Techniques" => "advancedFastingTechniques",
    "Comparing Treatments" => "comparingTreatments",
    "Success Stories" => "successStories",
    "Maintaining Health" => "maintainingHealth"
];


// Create variables dynamically and initialize them with an empty string
foreach ($chapterAssociativeArray as $name => $slug) {
    ${"content" . ucfirst(str_replace('-', '', $slug))} = "";
}




// Example of how to add content to one of the variables
$contentIntroduction = '
<div>
    <h2>Understanding Diabetes: A Brief Overview of Type 2 Diabetes and the Potential for Natural Reversal</h2>
    <h3>Type 2 Diabetes Overview</h3>
    <p>Type 2 diabetes is a chronic condition that affects millions globally, characterized by insulin resistance where the body\'s cells do not effectively respond to insulin. Unlike Type 1 diabetes, which is an autoimmune disease, Type 2 diabetes primarily results from lifestyle factors such as poor diet, lack of physical activity, and obesity. This condition can lead to severe complications like cardiovascular disease, kidney failure, nerve damage, and vision problems, significantly impacting life quality and increasing the risk of premature death.</p>
    <h3>Traditional Management</h3>
    <p>Traditionally, Type 2 diabetes is managed through medications like metformin and insulin injections, alongside lifestyle changes and regular blood sugar monitoring. However, these methods often do not address the underlying causes of the disease and can lead to long-term medication reliance with potential side effects.</p>
    <h3>Natural Methods for Reversal</h3>
    <p>Recently, there has been a shift towards natural methods to potentially reverse Type 2 diabetes by targeting the root causes of insulin resistance. Prominent among these is fasting, which has shown significant benefits in improving insulin sensitivity and metabolic health through mechanisms like ketosis and autophagy.</p>
    <h3>Dietary Modifications</h3>
    <p>Diet plays a crucial role in managing and potentially reversing Type 2 diabetes. Low-carb or no-carb diets help reduce blood sugar levels and insulin demand. When combined with fasting, these dietary changes can significantly enhance metabolic health.</p>
    <h3>Exercise</h3>
    <p>Regular physical activity is another vital component of naturally managing Type 2 diabetes. Exercise improves insulin sensitivity, aids in weight loss, and boosts cardiovascular health. Even moderate activities like walking or gentle yoga can offer substantial benefits, especially when integrated with dietary modifications and fasting.</p>
    <h3>Understanding and Empowerment</h3>
    <p>This book aims to empower readers by providing a comprehensive guide to understanding Type 2 diabetes and exploring natural methods for its reversal. It includes practical advice, scientific insights, and real-life success stories to inspire individuals towards achieving health and wellness through natural approaches.</p>
    <h3>Further Exploration</h3>
    <p>The subsequent chapters delve deeper into the science of fasting, benefits of low-carb diets, and practical tips for incorporating these strategies into daily life. The book also addresses common myths and misconceptions about diabetes management and offers advanced techniques for maximizing the benefits of natural methods.</p>
    <h3>Conclusion</h3>
    <p>By understanding the mechanisms of Type 2 diabetes and employing natural strategies for its management and potential reversal, individuals can take proactive steps towards improving their health and possibly achieving remission. The book serves as a valuable resource for anyone looking to combat Type 2 diabetes using natural methods.</p>
</div>';

$contentIntroductionToFasting = '
<div>
    <h2>Introduction to Fasting: Basics, Historical Significance, and the Science Behind Fasting</h2>
    <h3>Basics of Fasting</h3>
    <p>Fasting, the voluntary abstention from food and sometimes drink, has been a practice across various cultures and religions for millennia. It involves periods of not eating interspersed with periods of normal eating, with several types such as intermittent fasting (16/8 method, 5:2 method, Eat-Stop-Eat), extended fasting, alternate-day fasting, and time-restricted eating.</p>
    
    <h3>Historical Significance of Fasting</h3>
    <p>Fasting has historical roots in many religious and cultural practices, prescribed by figures like Hippocrates and embedded in religions such as Islam during Ramadan, Christianity during Lent, Judaism on Yom Kippur, and in Buddhism among monks and nuns. These practices emphasize fasting as a means to spiritual growth, self-discipline, and physical and spiritual purification.</p>
    
    <h3>The Science Behind Fasting</h3>
    <p>Recent scientific studies highlight fasting’s benefits in improving insulin sensitivity, inducing ketosis, triggering autophagy, regulating hormones like growth hormone, reducing inflammation, and enhancing mental clarity. These effects are particularly beneficial for managing conditions like Type 2 diabetes, where fasting can improve metabolic health and reduce insulin resistance.</p>
    
    <h3>Practical Benefits of Fasting</h3>
    <p>Fasting is simple, flexible, cost-effective, and sustainable, making it an appealing health management strategy. It requires no special foods or complex meal plans and can fit various lifestyles and preferences.</p>
    
    <h3>Fasting and Type 2 Diabetes</h3>
    <p>For those with Type 2 diabetes, fasting can be a potent tool to manage and potentially reverse the condition by enhancing insulin sensitivity and promoting cellular repair. However, it should be approached with caution and professional guidance to safely manage blood sugar levels and medication adjustments.</p>
    
    <h3>Conclusion</h3>
    <p>Fasting is a practice with profound historical roots and robust scientific support, offering natural and effective ways to enhance health and combat metabolic diseases like Type 2 diabetes. The subsequent chapters will explore deeper into fasting’s mechanisms, dietary strategies, and practical tips for integrating fasting into daily life, debunking common myths and maximizing its health benefits.</p>
</div>';

$contentGettingStartedWithFasting = '
<div>
    <h2>Getting Started with Fasting: Practical Guide for Beginners</h2>
    <h3>Choosing the Right Fasting Method</h3>
    <p>For beginners, it\'s essential to select a fasting method that aligns with their lifestyle and health goals. Popular methods include the 16/8 method, the 5:2 method, Eat-Stop-Eat, extended fasting, alternate-day fasting, and time-restricted eating. Starting with something manageable like the 16/8 method is often recommended.</p>
    
    <h3>Preparing for Your Fast</h3>
    <p>Preparation is crucial for a successful fasting experience. Beginners should consult healthcare providers, set clear goals, plan nutritious meals for eating windows, and start with shorter fasting periods to gradually adapt to the fasting lifestyle.</p>
    
    <h3>Safety Considerations</h3>
    <p>Monitoring blood sugar levels, especially for individuals with Type 2 diabetes, is vital. It\'s important to listen to the body\'s signals and avoid overeating post-fast. Maintaining electrolyte balance and avoiding strenuous exercise during extended fasts are also crucial for safety.</p>
    
    <h3>Hydration Tips</h3>
    <p>Staying hydrated is essential, with recommendations to drink plenty of water, herbal teas, and black coffee during fasting periods. Electrolyte drinks can be beneficial, especially during longer fasts, to maintain electrolyte balance.</p>
    
    <h3>Managing Hunger and Cravings</h3>
    <p>Beginners might face hunger and cravings, which can be managed by staying busy, drinking water, chewing sugar-free gum, and practicing mindful eating during eating windows.</p>
    
    <h3>Breaking Your Fast</h3>
    <p>Breaking a fast should be done with small, easily digestible meals, gradually increasing intake and focusing on balanced, nutritious foods to avoid blood sugar spikes.</p>
    
    <h3>Incorporating Fasting into Your Lifestyle</h3>
    <p>Consistency and flexibility are key to integrating fasting into one\'s lifestyle. Building a support system, tracking progress, and continuing education on fasting are beneficial for sustaining this practice.</p>
    
    <h3>Conclusion</h3>
    <p>Fasting offers numerous health benefits, particularly for managing Type 2 diabetes. By choosing an appropriate fasting method, preparing adequately, and adhering to safety guidelines, beginners can effectively embark on their fasting journey.</p>
</div>';


$contentKetosisAndAutophagy = '
<div>
    <h2>Ketosis and Autophagy: Leveraging Metabolic Processes for Health</h2>
    <h3>Understanding Ketosis</h3>
    <p>Ketosis is a metabolic state where the body uses fat instead of glucose as its primary energy source. This shift happens when carbohydrate intake is drastically reduced, leading to the breakdown of fat into ketones. Ketosis is beneficial for blood sugar control, weight loss, mental clarity, reduced inflammation, and increased energy levels.</p>
    
    <h3>How Ketosis Works</h3>
    <p>The process begins with glycogen depletion, followed by fat breakdown and ketone production. These ketones then serve as an energy source for various tissues, including the brain.</p>
    
    <h3>Understanding Autophagy</h3>
    <p>Autophagy is a cellular cleanup process activated during fasting. It involves the breakdown and recycling of damaged cellular components, promoting cellular renewal and preventing disease. This process is crucial for maintaining cellular health and longevity.</p>
    
    <h3>How Autophagy Works</h3>
    <p>Triggered by nutrient scarcity, autophagy involves the formation of autophagosomes that encapsulate damaged parts, which are then degraded and recycled. This helps in disease prevention and enhances immune function.</p>
    
    <h3>Leveraging Ketosis and Autophagy for Health</h3>
    <p>Intermittent fasting and low-carb or ketogenic diets are effective ways to induce ketosis and autophagy. These practices deplete glycogen stores, promote fat burning, and trigger cellular cleanup. Extended fasting and exercise also enhance these processes, improving overall health and metabolic functions.</p>
    
    <h3>Practical Tips</h3>
    <p>To benefit from ketosis and autophagy, maintain hydration, monitor progress through blood sugar and ketone levels, and listen to your body’s responses. Adjust your dietary and fasting strategies based on personal health needs and under professional guidance.</p>
    
    <h3>Conclusion</h3>
    <p>Understanding and leveraging ketosis and autophagy can significantly improve health outcomes, particularly in managing Type 2 diabetes and enhancing metabolic health. By incorporating fasting, dietary changes, and physical activity, individuals can harness these natural processes for better health and longevity.</p>
</div>';


$contentFastingBenefits = '
<div>
    <h2>Fasting Benefits: Impact on Diabetes, Mental Health, and Overall Wellness</h2>
    <h3>Impact on Diabetes</h3>
    <p>Fasting significantly improves insulin sensitivity, reduces blood sugar levels, aids in weight loss, lowers inflammation, and enhances autophagy. These effects collectively contribute to managing and potentially reversing Type 2 diabetes, reducing the risk of its complications such as cardiovascular disease and neuropathy.</p>
    
    <h3>Impact on Mental Health</h3>
    <p>Fasting enhances mental clarity and focus due to stabilized blood sugar levels and ketone production. It increases the production of BDNF, which supports cognitive functions and brain health, and reduces symptoms of depression and anxiety. Fasting also improves stress resilience and sleep quality, contributing to overall mental well-being.</p>
    
    <h3>Impact on Overall Wellness</h3>
    <p>Fasting supports weight management, improves metabolic health markers like cholesterol and blood pressure, and may increase longevity by promoting cellular repair and reducing inflammation. It also benefits digestive health by giving the digestive system a rest, boosts immune function, and enhances physical performance and detoxification.</p>
    
    <h3>Practical Tips for Maximizing Fasting Benefits</h3>
    <p>To maximize the benefits of fasting, choose a suitable fasting method, stay hydrated, consume nutrient-dense foods, and monitor your progress. Incorporating exercise, ensuring adequate sleep, and managing stress are also crucial to enhancing the effectiveness of fasting.</p>
    
    <h3>Conclusion</h3>
    <p>Fasting is a powerful tool for improving health across various domains, including diabetes management, mental health, and overall wellness. By understanding and implementing fasting appropriately, individuals can experience significant health improvements and a better quality of life.</p>
</div>';
$contentLowCarbAndNoCarbDiets = '
<div>
    <h2>Low-Carb and No-Carb Diets: Complementing Fasting for Diabetes Management</h2>
    <h3>Understanding Low-Carb and No-Carb Diets</h3>
    <p>Low-carb diets, including ketogenic, Atkins, and Paleo, restrict carbohydrate intake to about 20-50 grams per day, promoting a metabolic state of ketosis. No-carb diets eliminate all carbohydrates, focusing on animal-based foods, to intensify this metabolic state.</p>
    
    <h3>Benefits for Diabetes Management</h3>
    <p>These diets improve blood sugar control by reducing insulin demand and stabilizing blood glucose levels. They aid in weight loss by shifting the body’s metabolism to burn fat for energy, which is crucial for improving insulin sensitivity in Type 2 diabetes. Additionally, they reduce inflammation and enhance satiety, which helps in maintaining a healthy eating pattern.</p>
    
    <h3>Complementing Fasting</h3>
    <p>When combined with fasting, low-carb and no-carb diets enhance the entry into ketosis and stabilize blood sugar levels during both fasting and eating phases. This synergy accelerates fat loss, improves metabolic health, and reduces the cravings and hunger typically associated with fasting alone.</p>
    
    <h3>Practical Tips for Implementation</h3>
    <p>To integrate these diets with fasting, start gradually, prioritize whole foods, stay hydrated, and monitor your health markers. Adjustments may be necessary based on individual responses and under medical guidance, especially for those with Type 2 diabetes.</p>
    
    <h3>Conclusion</h3>
    <p>Low-carb and no-carb diets can significantly enhance the benefits of fasting, providing a robust approach for managing Type 2 diabetes and improving overall metabolic health. These diets not only support better glycemic control but also promote a sustainable, healthy weight and metabolic state when combined with fasting strategies.</p>
</div>';

$contentExerciseDuringFasting = '
<div>
    <h2>Exercise During Fasting: Benefits and Practical Tips</h2>
    <h3>Benefits of Light Exercise During Fasting</h3>
    <p>Light exercise, such as walking, enhances fat burning by increasing energy expenditure and improving insulin sensitivity during fasting. It helps stabilize blood sugar levels, boosts energy, improves mental clarity, and enhances mood by releasing endorphins. Additionally, it contributes to cardiovascular health by strengthening the heart and improving circulation.</p>
    
    <h3>Emphasis on Walking</h3>
    <p>Walking is an accessible, low-impact exercise that can be performed anywhere and is suitable for all fitness levels. It is particularly beneficial during fasting as it does not overly stress the body, supports mental health by reducing stress, and can be a social activity that enhances enjoyment and motivation.</p>
    
    <h3>Practical Tips for Walking During Fasting</h3>
    <p>To incorporate walking into a fasting routine effectively, start with short walks and gradually increase the duration as your body adapts. Stay hydrated, choose the right time for walking that fits your schedule, wear comfortable shoes, and listen to your body’s response to adjust the intensity. Vary your walking routes to keep the activity interesting and set achievable goals to track progress.</p>
    
    <h3>Conclusion</h3>
    <p>Incorporating light exercise like walking during fasting periods can significantly enhance the fasting benefits, supporting overall health and well-being. By following practical tips and listening to your body, you can make walking a rewarding part of your health regimen.</p>
</div>';

$contentMythsAndMisconceptions = '
<div>
    <h2>Clarifying Myths and Misconceptions About Fasting and Diet</h2>
    <h3>Common Myths Debunked</h3>
    <ul>
        <li><strong>Myth 1: Fasting Causes Muscle Loss</strong> - Intermittent and short-term fasting do not lead to significant muscle loss and can actually increase growth hormone production, which helps in muscle maintenance and repair.</li>
        <li><strong>Myth 2: Fasting Slows Down Metabolism</strong> - Contrary to the belief that fasting slows metabolism, short-term fasting has been shown to increase metabolic rate by up to 14%, aiding in fat burning and weight loss.</li>
        <li><strong>Myth 3: Frequent Meals are Necessary to Maintain Energy</strong> - Fasting stabilizes blood sugar and provides steady energy through ketone production, contrary to the myth that frequent meals are needed to maintain energy levels.</li>
        <li><strong>Myth 4: Low-Carb and No-Carb Diets Are Unhealthy</strong> - When properly planned, low-carb and no-carb diets can be nutritious, focusing on lean proteins, healthy fats, and non-starchy vegetables, contrary to the myth that they are inherently unhealthy.</li>
        <li><strong>Myth 5: Fasting Leads to Nutrient Deficiencies</strong> - With balanced meals during eating windows, fasting does not inherently cause nutrient deficiencies.</li>
        <li><strong>Myth 6: Fasting Is Unsafe for Everyone</strong> - While not suitable for everyone, fasting can be safe and beneficial under medical supervision, especially for those without contraindicating health conditions.</li>
        <li><strong>Myth 7: You Can\'t Exercise While Fasting</strong> - Light to moderate exercise, such as walking, can be beneficial and safe during fasting, enhancing its fat-burning and insulin-sensitivity benefits.</li>
    </ul>
    
    <h3>Conclusion</h3>
    <p>Fasting and dietary changes like low-carb and no-carb diets offer numerous health benefits and are often misunderstood. By debunking these myths with evidence-based insights, individuals can make informed decisions about incorporating these practices into their health regimen. Always consult with a healthcare professional before starting new dietary or fasting regimens.</p>
</div>';

$contentBiochemicalInsights = '
<div>
    <h2>Biochemical Insights: Key Body Changes During Fasting and Their Implications</h2>
    <h3>Glycogen Depletion and Gluconeogenesis</h3>
    <p>During fasting, the body first depletes its glycogen stores and then begins gluconeogenesis to produce glucose from non-carbohydrate sources. These processes stabilize blood sugar levels and reduce insulin resistance, benefiting those with Type 2 diabetes.</p>
    
    <h3>Ketosis</h3>
    <p>As fasting progresses and glycogen is depleted, the body enters ketosis, burning fat for fuel and producing ketones. This state supports weight loss, enhances mental clarity, and provides a steady energy source, reducing the risk of obesity-related conditions.</p>
    
    <h3>Autophagy</h3>
    <p>Fasting induces autophagy, a cellular cleanup process that removes damaged components, promoting cellular health and preventing diseases like neurodegenerative disorders and cancer.</p>
    
    <h3>Hormonal Changes</h3>
    <p>Fasting significantly lowers insulin levels and increases growth hormone and norepinephrine production. These hormonal changes enhance fat burning, improve insulin sensitivity, and help preserve muscle mass during weight loss.</p>
    
    <h3>Inflammation Reduction</h3>
    <p>Fasting reduces chronic inflammation markers, improving metabolic health and decreasing the risk of chronic diseases, including Type 2 diabetes and cardiovascular diseases.</p>
    
    <h3>Improved Lipid Profile</h3>
    <p>Fasting improves lipid profiles by reducing triglycerides and increasing HDL cholesterol levels, contributing to better cardiovascular health.</p>
    
    <h3>Enhanced Brain Function</h3>
    <p>Fasting boosts BDNF production, enhancing neuron growth and survival, which supports improved cognitive functions and reduces the risk of neurodegenerative diseases.</p>
    
    <h3>Conclusion</h3>
    <p>The biochemical changes triggered by fasting have significant health benefits, from improved metabolic health to enhanced cognitive function. Understanding these processes can help leverage fasting as a powerful tool for health and wellness, particularly in managing Type 2 diabetes and promoting overall well-being.</p>
</div>';

$contentAdvancedFastingTechniques = '
<div>
    <h2>Advanced Fasting Techniques: Maximizing Benefits and Managing Longer Fasts</h2>
    <h3>Types of Advanced Fasting Techniques</h3>
    <ul>
        <li><strong>Extended Fasting:</strong> Involves fasting for more than 24 hours, enhancing autophagy, deepening ketosis, and promoting significant weight loss.</li>
        <li><strong>Alternate-Day Fasting:</strong> Alternating days of normal eating with days of fasting or very low-calorie intake to maintain metabolic flexibility and sustained weight loss.</li>
        <li><strong>Prolonged Fasting:</strong> Refers to fasting periods exceeding 72 hours, leading to profound metabolic changes, increased autophagy, and improved insulin sensitivity.</li>
        <li><strong>Fasting-Mimicking Diet (FMD):</strong> A plant-based, very low-calorie diet for five consecutive days, mimicking the effects of fasting while providing some nutrients.</li>
    </ul>
    
    <h3>Benefits of Advanced Fasting Techniques</h3>
    <p>These techniques enhance autophagy, promote deeper ketosis, improve insulin sensitivity, accelerate weight and fat loss, and boost immune function. They also contribute to cardiovascular health by improving lipid profiles.</p>
    
    <h3>Practical Tips for Managing Longer Fasts</h3>
    <p>Preparation is crucial for extended fasts. It is important to stay hydrated, monitor health, and break fasts gradually with nutrient-dense foods. Light exercise like walking or gentle yoga can be beneficial, but strenuous activities should be avoided.</p>
    
    <h3>Potential Challenges and Solutions</h3>
    <p>Managing hunger and cravings, dealing with fatigue, and navigating social situations are common challenges. Strategies include staying hydrated, engaging in light activities, and planning for social interactions.</p>
    
    <h3>Conclusion</h3>
    <p>Advanced fasting techniques offer substantial health benefits, particularly for those looking to deepen their fasting practice. With proper preparation and adherence to safety guidelines, these methods can significantly enhance one\'s health and well-being.</p>
</div>';


$contentComparingTreatments = '
<div>
    <h2>Comparing Treatments: Fasting Versus Conventional Diabetes Treatments</h2>
    <h3>Conventional Diabetes Treatments</h3>
    <p>Conventional treatments for Type 2 diabetes typically include medications like metformin and insulin therapy, which are effective in controlling blood sugar levels but may have side effects and do not address the underlying causes of the disease. Lifestyle changes are also recommended to improve overall health and insulin sensitivity.</p>
    
    <h3>Fasting as a Treatment for Diabetes</h3>
    <p>Fasting, including methods like intermittent fasting and extended fasting, offers a natural approach to managing diabetes. It improves insulin sensitivity, promotes weight loss, stabilizes blood sugar levels, and triggers cellular processes like autophagy, which can reverse the progression of diabetes and enhance overall health.</p>
    
    <h3>Comparing Fasting and Conventional Treatments</h3>
    <p>Fasting not only addresses the symptoms of diabetes but also tackles the root causes by enhancing insulin sensitivity and reducing insulin resistance. Unlike conventional treatments, which often require ongoing medication and can lead to side effects like weight gain and gastrointestinal issues, fasting offers a sustainable and holistic approach with fewer side effects.</p>
    
    <h3>Effectiveness and Sustainability</h3>
    <p>Both fasting and conventional treatments can effectively manage blood sugar levels and reduce diabetes-related complications. However, fasting can potentially reverse diabetes and offers a more sustainable and cost-effective solution without the lifelong dependency on medications.</p>
    
    <h3>Holistic Health Benefits</h3>
    <p>Fasting enhances overall health by improving metabolic functions, reducing inflammation, and promoting cellular health through autophagy. It provides a comprehensive approach to health that conventional treatments often lack, focusing not just on blood sugar levels but also on long-term wellness and disease prevention.</p>
    
    <h3>Conclusion</h3>
    <p>While conventional diabetes treatments are effective in managing symptoms, fasting offers a holistic and potentially reversing approach to diabetes management. It is important for individuals to consult with healthcare professionals to tailor treatments to their specific needs and to consider fasting as part of a comprehensive health strategy.</p>
</div>';

$contentSuccessStories = '
<div>
    <h2>Success Stories: Real-Life Examples of Diabetes Reversal Through Fasting</h2>
    <h3>John\'s Journey to Health</h3>
    <p>John, a 52-year-old diagnosed with Type 2 diabetes, turned to intermittent fasting and a low-carb diet. Starting with the 16/8 method and progressing to 24-hour fasts, John lost 40 pounds, normalized his blood sugar levels, and eventually ceased medication.</p>
    
    <h3>Sarah\'s Transformation</h3>
    <p>Sarah, struggling with Type 2 diabetes for over a decade, adopted extended fasting up to 72 hours alongside a low-carb, high-fat diet. This approach stabilized her blood sugar, reduced cravings, and led to a 50-pound weight loss, significantly improving her health.</p>
    
    <h3>Mark\'s Remarkable Recovery</h3>
    <p>Mark, a 60-year-old retiree with Type 2 diabetes and hypertension, embraced the fasting-mimicking diet. This led to substantial health improvements including weight loss, normalized blood sugar, and reduced blood pressure, decreasing his medication dependency.</p>
    
    <h3>Jill McMahon\'s Transformation</h3>
    <p>Jill McMahon, after years of battling with Type 2 diabetes, integrated fasting and a ketogenic diet into her lifestyle. This combination not only helped her lose over 100 pounds but also restored her blood sugar to normal levels without insulin.</p>
    
    <h3>Anne Dobbins\' Life-Changing Discovery</h3>
    <p>Anne Dobbins, diagnosed with Type 2 diabetes, turned to intermittent fasting and a low-carb diet. Within months, she saw her blood glucose levels return to normal, effectively putting her diabetes into remission.</p>
    
    <h3>Conclusion</h3>
    <p>These inspiring stories highlight the effectiveness of fasting combined with dietary changes in reversing Type 2 diabetes. They showcase the potential of fasting to not only manage but potentially reverse diabetes, improving overall metabolic health and reducing dependency on medications.</p>
</div>';

$contentMaintainingHealth = '
<div>
    <h2>Maintaining Health: Strategies for Sustaining Progress Post-Fasting</h2>
    <h3>Balanced and Nutrient-Dense Diet</h3>
    <p>Continue focusing on whole, unprocessed foods, limit refined carbohydrates, and maintain portion control to keep blood sugar levels stable. Emphasize hydration and include a variety of nutrient-rich foods to support overall health.</p>
    
    <h3>Regular Physical Activity</h3>
    <p>Engage in regular exercise including moderate-intensity activities, strength training, and flexibility exercises. Incorporate physical activity into daily routines to enhance insulin sensitivity and support metabolic health.</p>
    
    <h3>Mindful Eating and Lifestyle Practices</h3>
    <p>Adopt mindful eating practices, plan meals ahead, manage stress effectively, and ensure adequate sleep to support ongoing health improvements. These practices help maintain the benefits achieved through fasting.</p>
    
    <h3>Monitoring and Support</h3>
    <p>Regular health check-ups and self-monitoring are crucial for maintaining progress. Stay connected with a support system and continue educating yourself on health and wellness to adapt to changes effectively.</p>
    
    <h3>Conclusion</h3>
    <p>Maintaining health post-fasting involves a comprehensive approach that includes diet, exercise, lifestyle adjustments, and regular monitoring. By implementing these strategies, individuals can sustain their health improvements and continue to manage or reverse Type 2 diabetes effectively.</p>
</div>';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1 class="mt-4">Knowledge Base</h1>
        <p>Learn how to navigate your journey to reverse diabetes effectively!</p>
        </div>
    </div>
</div>

<div class="container">
        <div class="row">
            <!-- Sidebar for navigation links -->
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php
                        $first = true;
                        foreach ($chapterAssociativeArray as $name => $slug) {
                            $activeClass = $first ? 'active' : '';
                            $ariaSelected = $first ? 'true' : 'false';
                            echo "<a class=\"nav-link $activeClass\" id=\"v-pills-$slug-tab\" data-bs-toggle=\"pill\" href=\"#v-pills-$slug\" role=\"tab\" aria-controls=\"v-pills-$slug\" aria-selected=\"$ariaSelected\">$name</a>";
                            $first = false; // Set first to false after the first iteration
                        }
                        ?>
         </div>
            </div>
            <!-- Main content area -->
            <div class="col-md-9">
                <?php echo $contentDivider;?>
                <div class="tab-content" id="v-pills-tabContent">
                        <?php
                       $first = true;
                        foreach ($chapterAssociativeArray as $name => $slug) {
                        $variableName = "content" . ucfirst($slug);
                        $activeClass = $first ? 'show active' : '';
                        $first = false; // Only the first tab-pane should be active

                        echo "<div class=\"tab-pane fade $activeClass\" id=\"v-pills-$slug\" role=\"tabpanel\" aria-labelledby=\"v-pills-$slug-tab\">";
                        echo $$variableName; // Using variable variables to output the content
                        echo "</div>\n";
                        }

                        ?>


                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
</div>


<!--
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Diabetes Overview</h2>
            <p><strong>Definition:</strong> Diabetes mellitus, commonly referred to as diabetes, is a chronic medical
                condition that occurs when the body cannot properly regulate blood sugar (glucose) levels.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Origins</h3>
            <p><strong>Insulin and Glucose Regulation:</strong> In individuals without diabetes, insulin helps cells
                absorb glucose from the bloodstream, providing energy for various bodily functions. In diabetes, the
                body either does not produce enough insulin (Type 1 diabetes) or cannot effectively use the insulin
                it produces (Type 2 diabetes).</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Types of Diabetes</h3>
            <ol>
                <li><strong>Type 1 Diabetes:</strong>
                    <ul>
                        <li><strong>Origin:</strong> Usually develops in childhood or adolescence.</li>
                        <li><strong>Cause:</strong> Thought to be an autoimmune condition where the immune system
                            mistakenly attacks and destroys insulin-producing beta cells in the pancreas.</li>
                        <li><strong>Management:</strong> Requires lifelong insulin therapy.</li>
                    </ul>
                </li>
                <li><strong>Type 2 Diabetes:</strong>
                    <ul>
                        <li><strong>Origin:</strong> Often develops in adulthood, but increasingly diagnosed in
                            children.</li>
                        <li><strong>Cause:</strong> Linked to genetic factors, lifestyle choices (such as poor diet
                            and lack of exercise), and obesity.</li>
                        <li><strong>Management:</strong> May involve lifestyle changes, oral medications, injectable
                            medications, and, in some cases, insulin.</li>
                    </ul>
                </li>
                <li><strong>Gestational Diabetes:</strong>
                    <ul>
                        <li><strong>Origin:</strong> Occurs during pregnancy.</li>
                        <li><strong>Cause:</strong> Hormonal changes during pregnancy can affect insulin's
                            effectiveness.</li>
                        <li><strong>Management:</strong> Monitoring blood sugar levels, lifestyle changes, and, in
                            some cases, medication.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Symptoms</h3>
            <ul>
                <li>Increased thirst and hunger</li>
                <li>Frequent urination</li>
                <li>Unexplained weight loss</li>
                <li>Fatigue</li>
                <li>Blurred vision</li>
                <li>Slow healing of wounds and frequent infections</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Complications</h3>
            <ul>
                <li>Cardiovascular problems</li>
                <li>Kidney damage (nephropathy)</li>
                <li>Nerve damage (neuropathy)</li>
                <li>Eye damage (retinopathy)</li>
                <li>Foot problems</li>
                <li>Skin conditions</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Diagnosis</h3>
            <p>Diabetes is often diagnosed through blood tests that measure blood sugar levels. Additional tests may
                be conducted to differentiate between Type 1 and Type 2 diabetes.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Treatment and Management</h3>
            <strong>Type 1 Diabetes:</strong>
            <ul>
                <li>Insulin therapy through injections or an insulin pump.</li>
            </ul>

            <strong>Type 2 Diabetes:</strong>
            <ul>
                <li>Lifestyle modifications: Healthy diet, regular exercise, weight management.</li>
                <li>Oral medications and/or injectable medications.</li>
                <li>Insulin therapy in some cases.</li>
            </ul>

            <strong>Gestational Diabetes:</strong>
            <ul>
                <li>Blood sugar monitoring.</li>
                <li>Lifestyle changes.</li>
                <li>Medication in some cases.</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Prevention</h3>
            <ul>
                <li>Maintain a healthy lifestyle: Eat a balanced diet, exercise regularly, and maintain a healthy
                    weight.</li>
                <li>Regular medical check-ups for early detection.</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Conclusion</h3>
            <p>Diabetes is a complex condition that requires careful management. Early diagnosis, lifestyle changes,
                and appropriate medical interventions are essential for controlling blood sugar levels and preventing
                complications. Individuals with diabetes should work closely with healthcare professionals to develop
                a personalized treatment plan based on their specific needs.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <iframe src="https://www.youtube.com/embed/XfyGv-xwjlI?si=NBC1STKksr-MZWjY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
            <iframe src="https://www.youtube.com/embed/4SZGM_E5cLI?si=69RdTIFIAsU7zEXQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>
            -->
<div style="margin-bottom:50px;">&nbsp;</div>