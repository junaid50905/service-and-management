import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";

const FAQ = () => {
  const faqItems = [
    {
      id: 1,
      question: "What is your return policy?",
      answer:
        "Our return policy allows you to return items within 30 days of purchase...",
    },
    {
      id: 2,
      question: "How do I contact customer support?",
      answer:
        "You can contact our customer support team by emailing support@example.com...",
    },
  ];
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box">
        <div className="max-w-full p-8 mx-auto mt-10 bg-white rounded-lg shadow-md font-roboto">
          <h1 className="mb-4 text-3xl font-semibold">
            Frequently Asked Questions
          </h1>
          <div>
            {faqItems.map((faqItem) => (
              <div key={faqItem.id} className="mb-6">
                <h2 className="text-lg font-semibold">{faqItem.question}</h2>
                <p className="text-gray-700">{faqItem.answer}</p>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
};

export default FAQ;
