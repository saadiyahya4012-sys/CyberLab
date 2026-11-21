export default async function handler(req, res) {
  if (req.method !== "POST") {
    return res.status(405).json({ message: "Method not allowed" });
  }

  const { email } = req.body || {};

  if (typeof email !== "string" ||
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    return res.status(400).json({ message: "Invalid test email" });
  }

  const token = process.env.BOT_TOKEN;
  const chatId = process.env.CHAT_ID;

  if (!token || !chatId) {
    return res.status(500).json({ message: "Configuration missing" });
  }

  try {
    const response = await fetch(
      `https://api.telegram.org/bot${token}/sendMessage`,
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          chat_id: chatId,
          text: `Cybersecurity Lab\nTest email: ${email}\nForm submitted successfully.`
        })
      }
    );

    const result = await response.json();

    if (!result.ok) {
      return res.status(502).json({ message: "Telegram failed" });
    }

    return res.status(200).json({ message: "Simulation completed!" });
  } catch {
    return res.status(502).json({ message: "Connection failed" });
  }
}