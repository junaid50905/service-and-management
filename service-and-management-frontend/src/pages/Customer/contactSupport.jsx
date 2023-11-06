import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import { BiSupport } from "react-icons/bi";
import { BiSolidPhoneCall } from "react-icons/bi";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faHeadphones } from "@fortawesome/free-solid-svg-icons";

const ContactSupport = () => {
  const contactsData = [
    {
      id: 1,
      name: "Customer Support",
      email: "support@example.com",
      phone: "123-456-7890",
      icon: <BiSupport />,
    },
    {
      id: 2,
      name: "Sales",
      email: "sales@example.com",
      phone: "987-654-3210",
      icon: <BiSolidPhoneCall />,
    },
  ];
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto text-gray-800 container-box font-roboto">
        <div className="grid grid-cols-1 gap-8 md:grid-cols-2">
          <section className="p-6 bg-white rounded shadow-md">
            <div className="flex items-center gap-3">
              <FontAwesomeIcon icon={faHeadphones} />
              <h2 className="text-2xl font-semibold">
                Contact Information
              </h2>
            </div>
            <ul>
              <li>
                <strong>Email:</strong> support@example.com
              </li>
              <li>
                <strong>Phone:</strong> +1 (123) 456-7890
              </li>
              <li>
                <strong>Physical Address:</strong> 123 Main St, City, Country
              </li>
            </ul>
            <p>You can also use the contact form below to send us a message.</p>
          </section>
          <section className="p-6 bg-white rounded shadow-md">
            <h2 className="mb-4 text-2xl font-semibold">Operating Hours</h2>
            <p>
              Our customer support team is available from 9:00 AM to 6:00 PM
              (GMT) on weekdays. We offer 24/7 support for emergency situations.
            </p>
          </section>
        </div>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">
            Frequently Asked Questions (FAQs)
          </h2>
          <p>Check out our FAQs for answers to common customer questions:</p>
          <a href="/faqs" className="text-blue-500 hover:underline">
            Visit FAQs
          </a>
        </section>
      
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">Response Times</h2>
          <p>Our typical response times are as follows:</p>
          <ul>
            <li>General Inquiries: Within 24 hours</li>
            <li>Technical Issues: Within 12 hours</li>
            <li>Warranty Claims: Within 48 hours</li>
          </ul>
        </section>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">Support Channels</h2>
          <p>You can reach us through various channels:</p>
          <ul>
            <li>Email: support@example.com</li>
            <li>Phone: +1 (123) 456-7890</li>
            <li>Live Chat: Available during operating hours</li>
            <li>Social Media: Follow us on Twitter, Facebook, and Instagram</li>
          </ul>
        </section>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">Support Policies</h2>
          <p>Here are some of our key support policies:</p>
          <ul>
            <li>Refund Policy: [Link to refund policy]</li>
            <li>Return Policy: [Link to return policy]</li>
            <li>Warranty Information: [Link to warranty details]</li>
          </ul>
        </section>
    
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">Languages Supported</h2>
          <p>Our customer support is available in the following languages:</p>
          <ul>
            <li>English</li>
            <li>Spanish</li>
            <li>French</li>
          </ul>
        </section>
      
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">
            Emergency Contact Information
          </h2>
          <p>For emergency situations, please use the following contact:</p>
          <ul>
            <li>
              <strong>Emergency Phone:</strong> +1 (123) 456-7890
            </li>
            <li>
              <strong>Emergency Email:</strong> emergency@example.com
            </li>
          </ul>
        </section>
       
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">
            Privacy and Security Information
          </h2>
          <p>
            Your privacy and security are important to us. Learn more about our
            privacy policies and security measures:
          </p>
          <a href="/privacy-policy" className="text-blue-500 hover:underline">
            Privacy Policy
          </a>
          <a href="/security" className="text-blue-500 hover:underline">
            Security Information
          </a>
        </section>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">Social Media Links</h2>
          <p>Connect with us on social media for updates and announcements:</p>
          <ul>
            <li>
              <a
                href="https://twitter.com/example"
                className="text-blue-500 hover:underline"
              >
                Twitter
              </a>
            </li>
            <li>
              <a
                href="https://facebook.com/example"
                className="text-blue-500 hover:underline"
              >
                Facebook
              </a>
            </li>
            <li>
              <a
                href="https://instagram.com/example"
                className="text-blue-500 hover:underline"
              >
                Instagram
              </a>
            </li>
          </ul>
        </section>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">
            Chatbots or Virtual Assistants
          </h2>
          <p>
            We have chatbots and virtual assistants to assist you with common
            inquiries. Click the chat icon to get started.
          </p>
        </section>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">Search Functionality</h2>
          <p>
            Use our search bar to quickly find information or answers to your
            questions.
          </p>
          <input
            type="text"
            placeholder="Search..."
            className="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:shadow-outline"
          />
        </section>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">
            Updates and Announcements
          </h2>
          <p>
            Stay informed about our service updates and important announcements.
          </p>
          <a href="/announcements" className="text-blue-500 hover:underline">
            View Announcements
          </a>
        </section>
        <section className="p-6 mt-8 bg-white rounded shadow-md">
          <h2 className="mb-4 text-2xl font-semibold">Feedback and Ratings</h2>
          <p>
            Your feedback helps us improve our support. Leave your feedback or
            ratings:
          </p>
          <a href="/feedback" className="text-blue-500 hover:underline">
            Leave Feedback
          </a>
        </section>
      </div>
    </div>
  );
};

export default ContactSupport;
