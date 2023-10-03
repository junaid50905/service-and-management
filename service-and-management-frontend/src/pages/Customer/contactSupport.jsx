import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";

const ContactSupport = () => {
  const contactsData = [
    {
      id: 1,
      name: "Customer Support",
      email: "support@example.com",
      phone: "123-456-7890",
    },
    {
      id: 2,
      name: "Sales",
      email: "sales@example.com",
      phone: "987-654-3210",
    },
  ];
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto text-gray-800 container-box">
        <div className="p-4">
          <h1 className="mb-4 text-2xl font-semibold">Contact and Support</h1>
          <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
            {contactsData.map((contact) => (
              <div
                key={contact.id}
                className="p-4 transition duration-300 ease-in-out bg-white rounded-lg shadow-lg hover:scale-103"
              >
                <h2 className="text-lg font-semibold">{contact.name}</h2>
                <p className="text-gray-600">{contact.email}</p>
                <p className="text-gray-600">{contact.phone}</p>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
};

export default ContactSupport;
