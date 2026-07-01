document.addEventListener('DOMContentLoaded', () => {
    // 1. Auto-hide alert notifications
    const alerts = document.querySelectorAll('.alert-notification');
    alerts.forEach(alert => {
        alert.style.transition = 'all 0.5s ease-in-out';
        alert.style.opacity = '1';
        alert.style.transform = 'translateY(0)';
        alert.style.overflow = 'hidden';
        
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)';
            
            setTimeout(() => {
                alert.style.maxHeight = '0px';
                alert.style.paddingTop = '0px';
                alert.style.paddingBottom = '0px';
                alert.style.marginTop = '0px';
                alert.style.marginBottom = '0px';
                alert.style.borderWidth = '0px';
                
                setTimeout(() => alert.remove(), 500);
            }, 150);
        }, 4000);
    });

    // 2. Custom Neobrutalist Confirmation Modal for elements with onclick confirm
    const confirmElements = document.querySelectorAll('[onclick*="confirm("]');
    confirmElements.forEach(elem => {
        const onclickStr = elem.getAttribute('onclick');
        const match = onclickStr.match(/confirm\(['"](.*?)['"]\)/);
        const message = match ? match[1] : 'Apakah Anda yakin?';
        
        // Remove inline onclick
        elem.removeAttribute('onclick');
        
        elem.addEventListener('click', (e) => {
            e.preventDefault();
            const form = elem.closest('form');
            
            showCustomConfirm(message, () => {
                if (form) {
                    form.submit();
                } else if (elem.tagName === 'A') {
                    window.location.href = elem.href;
                }
            });
        });
    });
});

function showCustomConfirm(message, onConfirm) {
    // Create modal element
    const modal = document.createElement('div');
    modal.style.position = 'fixed';
    modal.style.inset = '0';
    modal.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    modal.style.display = 'flex';
    modal.style.alignItems = 'center';
    modal.style.justifyContent = 'center';
    modal.style.zIndex = '99999';
    
    modal.innerHTML = `
        <div style="background: white; border: 4px solid black; padding: 24px; max-width: 420px; width: 90%; box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); transform: translateY(-20px); transition: all 0.3s ease-out; opacity: 0; font-family: 'Lexend', sans-serif;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px; border-b-4 border-black pb-3">
                <div style="width: 32px; height: 32px; background: #f87171; border: 2px solid black; display: flex; align-items: center; justify-content: center; font-weight: bold; font-family: 'Lexend', sans-serif;">!</div>
                <h3 style="font-size: 18px; font-weight: 800; text-transform: uppercase; margin: 0; font-family: 'Lexend', sans-serif;">Konfirmasi Tindakan</h3>
            </div>
            <p style="font-size: 15px; text-align: left; margin: 0 0 24px 0; line-height: 1.5; color: #1b1b1b; font-family: 'Lexend', sans-serif;">${message}</p>
            <div style="display: flex; justify-content: flex-end; gap: 12px;">
                <button id="btn-confirm-cancel" style="padding: 10px 20px; border: 3px solid black; background: #e2e2e2; font-weight: bold; text-transform: uppercase; font-size: 13px; box-shadow: 4px 4px 0px 0px rgba(0,0,0,1); cursor: pointer; font-family: 'Lexend', sans-serif;">Batal</button>
                <button id="btn-confirm-ok" style="padding: 10px 20px; border: 3px solid black; background: #f87171; color: white; font-weight: bold; text-transform: uppercase; font-size: 13px; box-shadow: 4px 4px 0px 0px rgba(0,0,0,1); cursor: pointer; font-family: 'Lexend', sans-serif;">Hapus</button>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Button pressing transitions
    const cancelBtn = modal.querySelector('#btn-confirm-cancel');
    const okBtn = modal.querySelector('#btn-confirm-ok');
    
    const applyPressEffects = (btn) => {
        btn.addEventListener('mousedown', () => {
            btn.style.transform = 'translate(2px, 2px)';
            btn.style.boxShadow = '2px 2px 0px 0px rgba(0,0,0,1)';
        });
        btn.addEventListener('mouseup', () => {
            btn.style.transform = 'none';
            btn.style.boxShadow = '4px 4px 0px 0px rgba(0,0,0,1)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'none';
            btn.style.boxShadow = '4px 4px 0px 0px rgba(0,0,0,1)';
        });
    };
    applyPressEffects(cancelBtn);
    applyPressEffects(okBtn);
    
    // Trigger entry transition
    const card = modal.querySelector('div');
    setTimeout(() => {
        card.style.transform = 'translateY(0)';
        card.style.opacity = '1';
    }, 50);
    
    // Close function
    const closeModal = () => {
        card.style.transform = 'translateY(-20px)';
        card.style.opacity = '0';
        setTimeout(() => modal.remove(), 300);
    };
    
    cancelBtn.addEventListener('click', closeModal);
    okBtn.addEventListener('click', () => {
        closeModal();
        onConfirm();
    });
}
