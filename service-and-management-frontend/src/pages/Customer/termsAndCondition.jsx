import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";

const TermsAndCondition = () => {
  const sections = [
    {
      id: 1,
      title: "Section 1: Introduction",
      content: "This is the introduction to our terms and conditions.",
    },
    {
      id: 2,
      title: "Section 2: Usage Agreement",
      content:
        "By using our service, you agree to abide by certain terms and conditions.",
    },
    {
      id: 3,
      title: "Section 3: Privacy Policy",
      content:
        "We take your privacy seriously. Read our privacy policy to learn more.",
    },
  ];
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto text-gray-800 bg-gray-100 container-box">
        <div className="max-w-full p-8 mx-auto mt-10 bg-white rounded-lg shadow-md">
          <h1 className="mb-4 text-3xl font-semibold">Terms and Conditions</h1>
          <div>
            {sections.map((section) => (
              <div key={section.id} className="mb-6">
                <h2 className="text-lg font-semibold">{section.title}</h2>
                <p className="text-gray-700">{section.content}</p>
              </div>
            ))}
          </div>
         
        </div>
      </div>
    </div>
  );
};

export default TermsAndCondition;
